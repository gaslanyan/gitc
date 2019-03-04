<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14/05/16
 * Time: 16:28
 */

namespace frontend\widgets;

use common\models\Enroll;
use common\models\Training;
use frontend\components\Helper;
use yii\base\Widget;

class EnrollWidget extends Widget
{
    public $title;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $model = new Enroll();
        $courses = Training::find()->where(['slug' => $this->title])->asArray()->one();
        $city = "Gyumri";
        $course = [];
        $lng = \Yii::$app->language;
        $courses_c = json_decode($courses['content']);

        if (empty($courses_c)) {
            $city = $this->title;
            $course = [
                'Software programming' => \Yii::t('app', 'Software programming'),
                'Mobile programming' => \Yii::t('app', 'Mobile programming'),

            ];
        }
        else
            $course[$courses['title']] = $courses_c->$lng->name;

        if ($model->load(\Yii::$app->request->post())) {
//            echo "<pre>";
//         var_dump(\Yii::$app->request->post());die;
//            $model->subjects = \Yii::$app->request->post('subjects');
            $model->state = 1;
            $model->city = $city;
            $model->course_id = 1;

            if ($model->save()) {
                return $this->render('thanks');
            } else {
                echo 'Please contact support';
            }


        } else {
            return $this->render('enrollWidget', [
                'model' => $model,
                'courses' => $course
            ]);
        }
    }
}
