<?php


namespace frontend\controllers;


use common\models\Projects;

class ProjectsController extends \yii\web\Controller

{


    public function actionIndex()

    {
        $projects = Projects::find()->where(['is_active' => 'active'])->asArray()->all();

        foreach ($projects as $index => $item) {
            $content = json_decode($item['content'], true);
            $projects[$index]['content'] = $content[\Yii::$app->language];
        }

        return $this->render('index',
            [
                'projects' => $projects
            ]);

    }
    public function actionView($slug)
    {
        if ($slug) {

            //Getting curent news for displaying
            $thread = Projects::find()->where(['slug' => $slug, 'is_active' => 'active'])->one();
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
                return $this->render('project', [
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

