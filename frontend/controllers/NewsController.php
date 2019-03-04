<?php

namespace frontend\controllers;

use common\models\News;
use yii\web\Controller;

class NewsController extends Controller
{
    /**
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionIndex()
    {
        $slug = \Yii::$app->request->get('slug');

        $newsContent = News::find()
            ->where(['is_active' => '1'])
//            ->orderBy(['id'=>SORT_DESC])
            ->asArray()
            ->all();


        foreach ($newsContent as $key => $item) {
            $newsContent[$key]['content'] = json_decode($item['content'], true);
        }

        if ($slug === null) {
            $slugs = News::find()
                ->where(['is_active' => '1'])
                ->orderBy(['id'=> SORT_DESC])
                ->asArray()
                ->one();
            $slug = $slugs['slug'];

        }
        $thread = News::find()->where(['slug' => $slug, 'is_active' => 1])->one();
        $content = json_decode($thread->content, true);
        $langContent = $content[\Yii::$app->language];
        preg_match_all('/src="([^"]*)"/i', $langContent['content'], $result);
        $lContent = preg_replace("/<img[^>]+\>/i", " ", $langContent['content']);
        return $this->render('index', [
            'thread' => $thread,
            'lcontent' => $langContent,
            'content' => $lContent,
            'result'=>$result,
            'newsContent' => $newsContent,
            'slug' => $slug
        ]);
    }

    public function actionView($slug)
    {
        if ($slug) {

            //Getting curent news for displaying
            $thread = News::find()->where(['slug' => $slug, 'is_active' => 1])->one();
            $content = json_decode($thread->content, true);


            //Getting news for sidebar
            $news = News::find()->where(['is_active' => 1])
                ->andWhere(['<>', 'id', $thread->id])
                ->limit(15)
                ->asArray()->all();

            foreach ($news as $key => $item) {
                $news[$key]['content'] = '';
                $temp = json_decode($item['content'], true);
                $news[$key]['content'] = $temp[\Yii::$app->language];
            }

//            echo \Yii::$app->language;exit;
            $langContent = $content[\Yii::$app->language];

//            print_r($thread->content);exit;
            if ($thread) {
                return $this->render('news', [
                    'thread' => $thread,
                    'news' => $news,
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
