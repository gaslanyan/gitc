<?php

namespace frontend\controllers;

use common\models\Courses;
use common\models\Enroll;
use yii\helpers\ArrayHelper;

class EnrollController extends \yii\web\Controller
{
    /**
     * Creates a new Enroll model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Enroll();

        $courses=ArrayHelper::map(Courses::find()->all(),'id','name');


        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['thanks']);
        } else {
//            print_r($model->getErrors());
            return $this->render('index', [
                'model' => $model,
                'courses' => $courses
            ]);
        }
    }

    public function actionThanks()
    {
        return $this->render('thanks', [
        ]);
    }
}
