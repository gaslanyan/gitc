<?php

namespace backend\controllers;

use common\models\Languages;
use common\models\News;
use common\models\NewsSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
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
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider =
            $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort->defaultOrder = [
            'id' => SORT_DESC
        ];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
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
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new News();
        $finalModel = [];

        $activeLanguages = Languages::find()->where(['is_active' => 1])->asArray()->all();

        foreach ($activeLanguages as $lang) {

            $langCode = $lang['code'];

            $finalModel[$langCode] = $this->generateDynamicModelforLanguage($langCode);

        }

        if ($model->load(Yii::$app->request->post())) {

            $model->content = json_encode(Yii::$app->request->post('DynamicModel'));
            $title = $model->title;
            $title = str_replace(" ", "-", strtolower($title));
            $model->slug = $title;
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
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $finalModel = [];
        $decodedContent = json_decode($model->content, true);

        $activeLanguages = Languages::find()->where(['is_active' => 1])->asArray()->all();

        foreach ($activeLanguages as $lang) {

            $langCode = $lang['code'];

            $finalModel[$langCode] = $this->generateDynamicModelforLanguage($langCode);

            //Loading content
            $finalModel[$langCode]->name = $decodedContent[$langCode]['name'];
            $finalModel[$langCode]->keywords = $decodedContent[$langCode]['keywords'];
            $finalModel[$langCode]->description = $decodedContent[$langCode]['description'];
            $finalModel[$langCode]->content = $decodedContent[$langCode]['content'];

        }
        if ($model->load(Yii::$app->request->post())) {
            $title = $model->title;
            $title = str_replace(" ", "-", strtolower($title));
            $model->slug = $title;

            $model->content = json_encode(Yii::$app->request->post('DynamicModel'));

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
     * Deletes an existing News model.
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
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    private function generateDynamicModelforLanguage($langCode)
    {
        $model = new \yii\base\DynamicModel([
            'name',
            'keywords',
            'description',
            'content'
        ]);
        $model->addRule(['name', 'content'], 'required')
            ->addRule(['keywords', 'description'], 'string', ['max' => 500]);

        return $model;
    }
}
