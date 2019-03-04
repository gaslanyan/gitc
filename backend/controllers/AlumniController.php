<?php

namespace backend\controllers;

use common\models\Alumni;
use common\models\Languages;
use common\models\search\AlumniSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * AlumniController implements the CRUD actions for Alumni model.
 */
class AlumniController extends Controller
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
     * Lists all Alumni models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlumniSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Alumni model.
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
     * Creates a new Alumni model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Alumni();

//        echo "<pre>";
//        var_dump(Yii::$app->request->post());
        if ($model->load(Yii::$app->request->post())) {

            $model->languages = json_encode($model->languages);
            $model->technical_languages = json_encode($model->technical_languages);
            $model->education = json_encode($model->education);
            $model->experience = json_encode($model->experience);
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Alumni model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);
        $model->languages = json_decode($model->languages);
        $model->technical_languages = json_decode($model->technical_languages);
        $model->education = json_decode($model->education, true);
        $model->experience = json_decode($model->experience, true);

        if ($model->load(Yii::$app->request->post())) {
            $model->languages = json_encode($model->languages);
            $model->technical_languages = json_encode($model->technical_languages);
            $model->education = json_encode($model->education);
            $model->experience = json_encode($model->experience);
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Alumni model.
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
     * Finds the Alumni model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Alumni the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Alumni::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
