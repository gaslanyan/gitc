<?php


namespace backend\controllers;


use common\models\Media;
use common\models\MediaSearch;
use common\models\Pages;
use common\models\Type;
use Yii;
use yii\base\Exception;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;


/**
 * MediaController implements the CRUD actions for Media model.
 */
class MediaController extends Controller
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

    /**
     * Lists all Media models.
     * @return mixed
     */
    public function actionIndex($type)
    {
//        echo $type['id'];
        $type = Type::find()->where(['title'=> $type])->asArray()->one();
        $searchModel = new MediaSearch();

        $dataProvider = $searchModel->search(['type_id'=> (int)$type['id']]);
        Yii::$app->session->set("type_id",(int)$type['id']);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Media model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Media model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Media();
        $model->files = UploadedFile::getInstance($model, 'files');
///slug, type_id

        if (Yii::$app->request->isPost) {
            $transaction = \Yii::$app->db->beginTransaction();
            try {
                $new_name = 'media-' . Yii::$app->security->generateRandomString() . '.' . $model->files->extension;

                $model->files->saveAs(Yii::getAlias('@root')
                    . Yii::$app->params['frontend_upload_path'] . Yii::$app->params['media'] . $new_name);
                $model->name = $new_name;
                $model->type_id = Yii::$app->session->get("type_id");

                if ($model->save(false)) {
                    $transaction->commit();
                    \Yii::$app->getSession()->setFlash('success',
                        '<div class="alert d-alert-success" role="alert">
                                <b>Thank you, your Media successfully saved!</b>
                            </div>');

//                    $searchModel = new MediaSearch();
//                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//
//                    return $this->render('index', [
//                        'searchModel' => $searchModel,
//                        'dataProvider' => $dataProvider,
//                    ]);
                    return "{}";
                }
            } catch (Exception $ex) {
                $transaction->rollBack();
            }

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Updates an existing Media model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);
        $model->files = UploadedFile::getInstance($model, 'files');

        if (Yii::$app->request->isPost) {
            $transaction = \Yii::$app->db->beginTransaction();
            try {
                $new_name = 'media-' . Yii::$app->security->generateRandomString() . '.' . $model->files->extension;
                $model->files->saveAs(Yii::getAlias('@root')
                    . Yii::$app->params['MEDIA_IMG_PATH'] . $new_name);
                unlink(Yii::getAlias('@root')
                    . Yii::$app->params['MEDIA_IMG_PATH'] . $model->name);
                $model->name = $new_name;

                if ($model->save(false)) {
                    $transaction->commit();
                    \Yii::$app->getSession()->setFlash('success',
                        '<div class="alert d-alert-success" role="alert">
                                <b>Thank you, your image successfully updated!</b>
                            </div>');

                    return "{}";
                }
            } catch (Exception $ex) {
                $transaction->rollBack();
            }

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Media model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $transaction = \Yii::$app->db->beginTransaction();
        try {
            $this->findModel($id)->name;
            unlink(Yii::getAlias('@root')
                . Yii::$app->params['frontend_upload_path'] .Yii::$app->params['media']. $this->findModel($id)->name);
            if ($this->findModel($id)->delete())
                $transaction->commit();
        } catch (Exception $ex) {
            $transaction->rollBack();
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Media model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Media the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Media::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

