<?php


namespace frontend\controllers;

use common\models\Pages;
use common\models\Press;


class AboutController extends \yii\web\Controller

{


    public function actionIndex()

    {  //Getting current news for displaying
        $thread = Pages::find()->where(['slug' => "about", 'is_active' => 1])->one();
        $content = json_decode($thread->content, true);
        $media = [];

        $media = Press::find()->orderBy(['id' => SORT_DESC])
            ->asArray()->all();
        foreach ($media as $index => $m) {
            $m_content = json_decode($m['content'], true);
            $media[$index]['content'] = $m_content[\Yii::$app->language];

        }
        $langContent = $content[\Yii::$app->language];
//            echo '<pre>';
//print_r($langContent);exit;

        if ($thread) {
            return $this->render('index', [
                'thread' => $thread,
                'content' => $langContent,
                'media' => $media,
                'slug' => 'about'
            ]);
        } else {
            return $this->redirect('index');
        }
    }
}

