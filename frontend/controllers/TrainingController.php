<?php


namespace frontend\controllers;


use common\models\Students;
use common\models\Training;
use common\models\WorkPlace;

class TrainingController extends \yii\web\Controller

{


    public function actionIndex()
    {
        $popular = Training::find()->where(['status' => 'popular'])->asArray()->all();

        foreach ($popular as $index => $item) {
            $content = json_decode($item['content'], true);
            $popular[$index]['content'] = $content[\Yii::$app->language];
        }
        $other = Training::find()->where(['status' => 'other'])->asArray()->all();

        foreach ($other as $index => $item) {
            $content = json_decode($item['content'], true);
            $other[$index]['content'] = $content[\Yii::$app->language];
        }
        $options = Students::find()->asArray()->all();
        foreach ($options as $index => $option) {
            $content = json_decode($option['content'], true);
            $options[$index]['content'] = $content[\Yii::$app->language];
        }
        $work_place = WorkPlace::find()->asArray()->all();
        return $this->render('index', [
            'other' => $other,
            'popular' => $popular,
            'options' => $options,
            'work'=>$work_place,
        ]);

    }

    public function actionView($slug)
    {
        if ($slug) {

            //Getting curent news for displaying
            $thread = Training::find()->where(['slug' => $slug, 'is_active' => 1])->one();
            $content = json_decode($thread->content, true);


//            //Getting news for sidebar
//            $news = News::find()->where(['is_active' => 1])
//                ->andWhere(['<>', 'id', $thread->id])
//                ->limit(15)
//                ->asArray()->all();
//
//            foreach ($news as $key => $item) {
//                $news[$key]['content'] = '';
//                $temp = json_decode($item['content'], true);
//                $news[$key]['content'] = $temp[\Yii::$app->language];
//            }

//            echo \Yii::$app->language;exit;
            $langContent = $content[\Yii::$app->language];

//            print_r($thread->content);exit;
            if ($thread) {
                return $this->render('training', [
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

