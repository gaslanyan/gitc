<?php
namespace frontend\controllers;
use common\models\Region;

class RegionsController extends \yii\web\Controller

{
    public function actionIndex()

    {
        $regions = Region::find()->where(['is_status' => 1])->asArray()->all();


        foreach ($regions as $index => $item) {
            $content = json_decode($item['description'], true);
            $regions[$index]['content'] = $content[\Yii::$app->language];
        }

        return $this->render('index',
            [
                'regions' => $regions
            ]);

    }
    public function actionView($slug)
    {

        if ($slug) {
            //Getting curent news for displaying
            $thread = Region::find()->where(['region' => $slug,
                'is_status' => '1'])->one();
            $content = json_decode($thread->description, true);

            $langContent = $content[\Yii::$app->language];

//            print_r($thread->content);exit;
            if ($thread) {
                return $this->render('region', [
                    'thread' => $thread,
//                    'news' => $news,
                    'content' => $langContent,
                ]);
            } else {
                return $this->redirect('index');
            }


        } else {
            return $this->redirect('index');
        }


    }


}

