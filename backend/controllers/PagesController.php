<?php

namespace backend\controllers;

use common\models\Languages;
use common\models\Pages;
use common\models\PagesSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * PagesController implements the CRUD actions for Pages model.
 */
class PagesController extends Controller
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
     * Lists all Pages models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PagesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pages model.
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
     * Creates a new Pages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pages();
        $finalModel = [];

        $activeLanguages = Languages::find()->where(['is_active' => 1])->asArray()->all();

        foreach ($activeLanguages as $lang) {

            $langCode = $lang['code'];
            $finalModel[$langCode] = $this->generateDynamicModelforLanguage($langCode);

        }
        var_export(Yii::$app->request->post('DynamicModel'));
        if ($model->load(Yii::$app->request->post())) {

            $model->content = json_encode(Yii::$app->request->post('DynamicModel'));

            if ($model->save()) {
//                return $this->redirect(['view', 'id' => $model->id]);
                return $this->redirect(['index']);
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
     * Updates an existing Pages model.
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

            if (!empty($decodedContent[$langCode]['s_name'])) {
                $finalModel[$langCode]->s_name = $decodedContent[$langCode]['s_name'];
                $finalModel[$langCode]->s_profession = $decodedContent[$langCode]['s_profession'];
                $finalModel[$langCode]->s_image = $decodedContent[$langCode]['s_image'];
                $finalModel[$langCode]->s_linkedin = $decodedContent[$langCode]['s_linkedin'];
            }
            if (!empty($decodedContent[$langCode]['l_name'])) {
                $finalModel[$langCode]->l_name = $decodedContent[$langCode]['l_name'];
                $finalModel[$langCode]->l_profession = $decodedContent[$langCode]['l_profession'];
                $finalModel[$langCode]->l_image = $decodedContent[$langCode]['l_image'];
                $finalModel[$langCode]->l_linkedin = $decodedContent[$langCode]['l_linkedin'];
            }
        }

        if ($model->load(Yii::$app->request->post())) {


            $model->content = json_encode(Yii::$app->request->post('DynamicModel'));

            if ($model->save()) {
//                return $this->redirect(['view', 'id' => $model->id]);
                return $this->redirect(['index']);
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
     * Deletes an existing Pages model.
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
     * Finds the Pages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pages::findOne($id)) !== null) {
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
            'staff',
            's_name',
            's_profession',
            's_image',
            's_linkedin',
            'lecture',
            'l_name',
            'l_profession',
            'l_image',
            'l_linkedin'
        ]);
        $model->addRule(['name', 'content'], 'required')
            ->addRule(['keywords', 'description',], 'string', ['max' => 500]);

        return $model;
    }
}
