<?php


namespace backend\controllers;


use common\models\Slider;
use common\models\SliderSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


/**
 * SliderController implements the CRUD actions for Slider model.
 */
class SliderController extends Controller

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
     * Lists all Slider models.
     * @return mixed
     */

    public function actionIndex()

    {


        $searchModel = new SliderSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index', [

            'searchModel' => $searchModel,

            'dataProvider' => $dataProvider,

        ]);


    }


    /**
     * Displays a single Slider model.
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
     * Creates a new Slider model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate(){
        $model = new Slider();

        if (Yii::$app->request->post()) {
            $name = Yii::$app->request->post('name');
            $images = [];
            foreach ($name as $index => $item) {
                $images[] =basename($item);
            }
            $model->name = json_encode($images);

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                print_r($model->getErrors());
                return $this->redirect(['index']);
            }
        } else {
            return $this->render('create', [

                'model' => $model,

            ]);

        }

    }


    /**
     * Updates an existing Slider model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */

    public function actionUpdate($id)

    {

        $model = $this->findModel($id);


        if (Yii::$app->request->post()) {
            $name = Yii::$app->request->post('name');
            $images = [];

            foreach ($name as $index => $item) {
                $images[] =basename($item);
            }
            $model->name = json_encode($images);

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                print_r($model->getErrors());
                return $this->redirect(['index']);
            }
        } else {

            return $this->render('update', [

                'model' => $model,

            ]);

        }

    }


    /**
     * Deletes an existing Slider model.
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
     * Finds the Slider model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Slider the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    protected function findModel($id)

    {


        if (($model = Slider::findOne($id)) !== null) {

            return $model;

        } else {

            throw new NotFoundHttpException('The requested page does not exist.');

        }

    }

}

