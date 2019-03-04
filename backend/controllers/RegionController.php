<?php

namespace backend\controllers;

use common\models\Languages;
use common\models\Region;
use common\models\search\RegionSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

//use pheme\grid\actions\ToggleAction;

/**
 * RegionController implements the CRUD actions for Region model.
 *
 * @author Devi Ardiana <deviardn@gmail.com>
 * @since version 1.0
 */
class RegionController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'toggle' => [
//                'class' => ToggleAction::className(),
                'modelClass' => 'common\models\Region',
                'attribute' => 'is_status',
                'setFlash' => true,
            ],
        ];
    }

    /**
     * Lists all Region models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Region();
        $searchModel = new RegionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = ['defaultPageSize' => 10];
        $dataProvider->sort = ['defaultOrder' => ['id' => 'DESC']];

        return $this->render('index', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Region model.
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
     * Creates a new Region model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Region();
        $finalModel = [];
        $activeLanguages = Languages::find()->where(['is_active' => 1])->asArray()->all();

        foreach ($activeLanguages as $lang) {
            $langCode = $lang['code'];
            $finalModel[$langCode] = $this->generateDynamicModelforLanguage($langCode);
        }

        if ($model->load(Yii::$app->request->post())) {
            $img_name = Yii::$app->request->post('img_name');
            $dm = Yii::$app->request->post('DynamicModel');
            $model->img_name = $img_name;

            $model->description = json_encode($dm);
            $model->create_at = new \yii\db\Expression('NOW()');
            $model->update_at = new \yii\db\Expression('NOW()');

            if ($model->save()) {

                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                print_r($model->getErrors());
            }
        } else {

            return $this->render('create', [

                'model' => $model,
                'activeLanguages' => $activeLanguages,
                'finalModel' => $finalModel
            ]);

        }
    }

    /**
     * Updates an existing Region model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $finalModel = [];
        $decodedContent = json_decode($model->description, true);
        $activeLanguages = Languages::find()->where(['is_active' => 1])->asArray()->all();

        foreach ($activeLanguages as $lang) {
            $langCode = $lang['code'];
            $finalModel[$langCode] = $this->generateDynamicModelforLanguage($langCode);
//            Loading content
            $finalModel[$langCode]->title = $decodedContent[$langCode]['title'];
            $finalModel[$langCode]->description = $decodedContent[$langCode]['description'];

        }

        if ($model->load(Yii::$app->request->post())) {

            $img_name = Yii::$app->request->post('img_name');
            $model->description = json_encode(Yii::$app->request->post('DynamicModel'));
            $model->img_name = $img_name;
            $title = $model->region;
            $title = str_replace(" ", "-", strtolower($title));
            $model->region = $title;

            $model->update_at = new \yii\db\Expression('NOW()');

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                print_r($model->getErrors());
            }
        } else {

            return $this->render('update', [
                'model' => $model,
                'activeLanguages' => $activeLanguages,
                'finalModel' => $finalModel
            ]);
        }
    }

    /**
     * Deletes an existing Region model.
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
     * Finds the Region model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Region the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Region::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    private function generateDynamicModelforLanguage($langCode)
    {
        $model = new \yii\base\DynamicModel([
            'title',
            'description',

        ]);
        $model->addRule(['title'], 'required')
            ->addRule(['description'], 'string', ['max' => 1500]);

        return $model;
    }
}
