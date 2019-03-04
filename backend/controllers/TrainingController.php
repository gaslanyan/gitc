<?php


namespace backend\controllers;


use backend\models\TrainingSearch;
use common\models\Languages;
use common\models\Training;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


/**
 * TrainingController implements the CRUD actions for Training model.
 */
class TrainingController extends Controller

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
     * Lists all Training models.
     * @return mixed
     */

    public function actionIndex()

    {


        $searchModel = new TrainingSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $dataProvider->sort->defaultOrder = [
            'id' => SORT_DESC
        ];
        return $this->render('index', [

            'searchModel' => $searchModel,

            'dataProvider' => $dataProvider,

        ]);


    }


    /**
     * Displays a single Training model.
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
     * Creates a new Training model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()

    {
        $model = new Training();
        $finalModel = [];
        $activeLanguages = Languages::find()->where(['is_active' => 1])->asArray()->all();
        foreach ($activeLanguages as $lang) {
            $langCode = $lang['code'];
            $finalModel[$langCode] = $this->generateDynamicModelforLanguage($langCode);
        }

        if ($model->load(Yii::$app->request->post())) {
            $img_name = Yii::$app->request->post('img_name');
            $model->content = json_encode(Yii::$app->request->post('DynamicModel'));
            $model->img_name = $img_name;
            $title = $model->title;
            $title = str_replace(" ", "-", strtolower($title));
            if ($model->status === "other")
                $model->slug = "current-" . $title;
            else
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
     * Updates an existing Training model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
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

//            Loading content
            $finalModel[$langCode]->name = $decodedContent[$langCode]['name'];
            $finalModel[$langCode]->keywords = $decodedContent[$langCode]['keywords'];
            $finalModel[$langCode]->description = $decodedContent[$langCode]['description'];
            $finalModel[$langCode]->content = $decodedContent[$langCode]['content'];
            $finalModel[$langCode]->start = $decodedContent[$langCode]['start'];
            $finalModel[$langCode]->day = $decodedContent[$langCode]['day'];
            $finalModel[$langCode]->duration = $decodedContent[$langCode]['duration'];
            $finalModel[$langCode]->hours = $decodedContent[$langCode]['hours'];

        }
        if ($model->load(Yii::$app->request->post())) {

            $img_name = Yii::$app->request->post('img_name');
            $model->content = json_encode(Yii::$app->request->post('DynamicModel'));
            $model->img_name = $img_name;
            $title = $model->title;
            $title = str_replace(" ", "-", strtolower($title));
            if ($model->status === "other")
                $model->slug = "current-" . $title;
            else
                $model->slug = $title;
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
     * Deletes an existing Training model.
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
     * Finds the Training model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Training the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    protected function findModel($id)

    {


        if (($model = Training::findOne($id)) !== null) {

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
            'start',
            'day',
            'duration',
            'hours'
        ]);
        $model->addRule(['name', 'content'], 'required')
            ->addRule(['keywords', 'description'], 'string', ['max' => 500])
            ->addRule(['start', 'day', 'dueation', 'hours'], 'string', ['max' => 100]);

        return $model;
    }
}

