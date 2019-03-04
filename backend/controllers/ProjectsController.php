<?php


namespace backend\controllers;


use common\models\Languages;
use common\models\Projects;
use common\models\ProjectsSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


/**
 * ProjectsController implements the CRUD actions for Projects model.
 */
class ProjectsController extends Controller

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
                    'delete' => ['post'],
                ],
            ],
        ];
    }


    /**
     * Lists all Projects models.
     * @return mixed
     */

    public function actionIndex()

    {


        $searchModel = new ProjectsSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index', [

            'searchModel' => $searchModel,

            'dataProvider' => $dataProvider,

        ]);


    }


    /**
     * Displays a single Projects model.
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
     * Creates a new Projects model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()

    {

        $model = new Projects();

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
            $slug = str_replace("", "-", strtolower($model->title));
            $model->slug = $slug;
            $model->content = json_encode($dm);

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
     * Updates an existing Projects model.
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
            $img_name = Yii::$app->request->post('img_name');
            $langCode = $lang['code'];
            $model->img_name = $img_name;
            $finalModel[$langCode] = $this->generateDynamicModelforLanguage($langCode);

//            Loading content
            $finalModel[$langCode]->name = $decodedContent[$langCode]['name'];
            $finalModel[$langCode]->keywords = $decodedContent[$langCode]['keywords'];
            $finalModel[$langCode]->description = $decodedContent[$langCode]['description'];
            $finalModel[$langCode]->content = $decodedContent[$langCode]['content'];
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->content = json_encode(Yii::$app->request->post('DynamicModel'));
            $slug = str_replace("", "-", strtolower($model->title));
            $model->slug = $slug;
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
     * Deletes an existing Projects model.
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
     * Finds the Projects model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Projects the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    protected function findModel($id)

    {


        if (($model = Projects::findOne($id)) !== null) {

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
            'content',
        ]);
        $model->addRule(['name', 'content'], 'required')
            ->addRule(['keywords', 'description'], 'string', ['max' => 500]);

        return $model;
    }

}

