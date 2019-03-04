<?php

namespace backend\controllers;

use Yii;
use common\models\ProductsImage;
use pheme\grid\actions\ToggleAction;
use common\models\Products;
use app\models\ProductsSearch;
use yii\base\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'toggle' => [
                'class' => ToggleAction::className(),
                'modelClass' => 'common\models\Products',
                'attribute' => 'is_status',
                'setFlash' => true
            ]
        ];
    }

    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = ['defaultPageSize' => 10,];
        $dataProvider->sort = ['defaultOrder' => ['id' => 'DESC']];


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate1()
    {
        $model = new Products();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionCreate(){
        $modelProducts = new Products();
        $modelImage = [new ProductsImage];

        if ($modelProducts->load(\Yii::$app->request->post())) {

            $modelImage = \common\models\Model::createMultiple(ProductsImage::className());
            \common\models\Model::loadMultiple($modelImage, \Yii::$app->request->post());


            //ajax validation
            if (\Yii::$app->request->isAjax) {
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return \yii\helpers\ArrayHelper::merge(
                    \yii\widgets\ActiveForm::validateMultiple($modelImage),
                    \yii\widgets\ActiveForm::validate($modelProducts)
                );
            }

            // validate all
            $valid = $modelProducts->validate();
            $valid = \common\models\Model::validateMultiple($modelImage) && $valid;



            $modelProducts->create_at = new \yii\db\Expression('NOW()');
            $modelProducts->update_at = new \yii\db\Expression('NOW()');
            $modelProducts->is_status = 0;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelProducts->save(false)) {

                        foreach ($modelImage as $i => $modelImage) {
                            $modelImage->product_id = $modelProducts->id;

                            $name = Yii::$app->security->generateRandomString();
                            $modelImage->imageFile = UploadedFile::getInstance($modelImage, "[$i]imageFile");

                            $modelImage->imageFile->saveAs('uploads/products/' . $name . '.' . $modelImage->imageFile->extension); //Upload files to server
                            ////save path in db column
                            $modelImage->image = 'uploads/products/' . $name . '.' . $modelImage->imageFile->extension;

                            if (!($flag = $modelImage->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        \Yii::$app->getSession()->setFlash('success',
                            '<div class="alert d-alert-success" role="alert"><b>Thank you, your Product successfully saved!</b></div>');
                        return $this->redirect(['success', 'id' => $modelProducts->id]);
                    }
                } catch (Exception $ex) {
                    $transaction->rollBack();


                }
            }

            print_r($modelProducts->getErrors());
//            print_r($modelImage->getErrors());
        } else {
            return $this->render('create', [
                'modelProducts' => $modelProducts,
                'modelImage' => (empty($modelImage)) ? [new ProductsImage()] : $modelImage
            ]);
        }
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
