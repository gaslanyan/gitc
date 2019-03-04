<?php



namespace backend\controllers;



use common\models\Languages;
use Yii;

use common\models\Students;


use common\models\StudentsSearch;


use yii\web\Controller;

use yii\web\NotFoundHttpException;

use yii\filters\VerbFilter;



/**

 * StudentsController implements the CRUD actions for Students model.

 */

class StudentsController extends Controller

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

     * Lists all Students models.

     * @return mixed

     */

    public function actionIndex()

    {


        $searchModel = new StudentsSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);



        return $this->render('index', [

            'searchModel' => $searchModel,

            'dataProvider' => $dataProvider,

        ]);


    }



    /**

     * Displays a single Students model.

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

     * Creates a new Students model.

     * If creation is successful, the browser will be redirected to the 'view' page.

     * @return mixed

     */

    public function actionCreate()

    {

        $model = new Students();
        $finalModel = [];
        $activeLanguages = Languages::find()->where(['is_active'=>1])->asArray()->all();

        foreach($activeLanguages as $lang){

            $langCode = $lang['code'];

            $finalModel[$langCode] = $this->generateDynamicModelforLanguage($langCode);

        }

        if ($model->load(Yii::$app->request->post())) {
            $img_name = Yii::$app->request->post('img_name');
            $model->content = json_encode(Yii::$app->request->post('DynamicModel'));
            $model->img_name = $img_name;
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
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

     * Updates an existing Students model.

     * If update is successful, the browser will be redirected to the 'view' page.

     * @param integer $id

     * @return mixed

     */

    public function actionUpdate($id)

    {

        $model = $this->findModel($id);

        $finalModel = [];
        $decodedContent = json_decode($model->content, true);

        $activeLanguages = Languages::find()->where(['is_active'=>1])->asArray()->all();

        foreach($activeLanguages as $lang){

            $langCode = $lang['code'];
            $img_name = Yii::$app->request->post('img_name');
            $finalModel[$langCode] = $this->generateDynamicModelforLanguage($langCode);
            $model->img_name = $img_name;
            //Loading content
            $finalModel[$langCode]->name = $decodedContent[$langCode]['name'];
            $finalModel[$langCode]->status = $decodedContent[$langCode]['status'];
            $finalModel[$langCode]->content = $decodedContent[$langCode]['content'];

        }
        if ($model->load(Yii::$app->request->post())) {


            $model->content = json_encode(Yii::$app->request->post('DynamicModel'));

            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
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

     * Deletes an existing Students model.

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

     * Finds the Students model based on its primary key value.

     * If the model is not found, a 404 HTTP exception will be thrown.

     * @param integer $id

     * @return Students the loaded model

     * @throws NotFoundHttpException if the model cannot be found

     */

    protected function findModel($id)

    {


        if (($model = Students::findOne($id)) !== null) {

            return $model;

        } else {

            throw new NotFoundHttpException('The requested page does not exist.');

        }

    }
    private function generateDynamicModelforLanguage($langCode){
        $model = new \yii\base\DynamicModel([
            'name',
            'status',
            'content'
        ]);
        $model->addRule(['name','content','status'], 'required');

        return $model;
    }
}

