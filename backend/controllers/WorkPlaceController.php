<?php


namespace backend\controllers;


use common\models\WorkPlace;
use common\models\WorkPlaceSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


/**
 * WorkPlaceController implements the CRUD actions for WorkPlace model.
 */
class WorkPlaceController extends Controller

{

    /**
     * @inheritdoc
     */

    public function behaviors()

    {
        $this->enableCsrfValidation = false;
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
     * Lists all WorkPlace models.
     * @return mixed
     */

    public function actionIndex()

    {


        $searchModel = new WorkPlaceSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index', [

            'searchModel' => $searchModel,

            'dataProvider' => $dataProvider,

        ]);


    }


    /**
     * Displays a single WorkPlace model.
     * @param string $id
     * @return mixed
     */

    public function actionView($id)

    {

        return $this->render('view', [

            'model' => $this->findModel($id),

        ]);

    }


    /**
     * Creates a new WorkPlace model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()

    {

        $model = new WorkPlace();
        if ($model->load(Yii::$app->request->post())) {
            $name = Yii::$app->request->post('name')[0];
            Yii::$app->request->post('sort_id');
            $model->name = $name;
            if ($model->save())
                return $this->redirect(['view', 'id' => $model->id]);
            else
                print_r($model->getErrors());

        } else {

            return $this->render('create', [

                'model' => $model,

            ]);

        }

    }


    /**
     * Updates an existing WorkPlace model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */

    public function actionUpdate($id)

    {

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $name = Yii::$app->request->post('name')[0];
            $model->name = $name;

            if ($model->save())
                return $this->redirect(['view', 'id' => $model->id]);
            else
                print_r($model->getErrors());
        } else {

            return $this->render('update', [

                'model' => $model,

            ]);

        }

    }


    /**
     * Deletes an existing WorkPlace model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */

    public function actionDelete($id)

    {

        $this->findModel($id)->delete();


        return $this->redirect(['index']);

    }


    /**
     * Finds the WorkPlace model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return WorkPlace the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    protected function findModel($id)

    {


        if (($model = WorkPlace::findOne($id)) !== null) {

            return $model;

        } else {

            throw new NotFoundHttpException('The requested page does not exist.');

        }

    }

}

