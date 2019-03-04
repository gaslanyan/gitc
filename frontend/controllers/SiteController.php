<?php

namespace frontend\controllers;

use common\models\Enroll;
use common\models\Pages;
use common\models\Press;
use common\models\Training;
use frontend\models\ContactForm;
use Yii;
use yii\web\Controller;
use yii\web\Cookie;


/**
 * Site controller
 */
class SiteController extends Controller
{

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'foreColor' => 0x314154
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {

//        echo Yii::$app->language;exit;
        $model = new Enroll();
        $courses = Training::find()
            ->groupBy(['title'])
            ->asArray()->all();
        $lng = \Yii::$app->language;
        $course = [];
        foreach ($courses as $index => $item) {
            $content = $item['content'];
            $content = json_decode($content);
            $course[$item['id']] = $content->$lng->name;

        }

        $pageInfo = Pages::find()->where(['id' => 1])->one();
        $content = json_decode($pageInfo->content, true);
        $pageContent = $content[\Yii::$app->language];
//        echo '<pre>';
//        print_r($pageContent);exit;


        if ($model->load(\Yii::$app->request->post())) {

            $sub = \Yii::$app->request->post('Enroll');
            $subject_id = $sub["course_id"];
            $subject = Training::find()->where(['id' => (int)$subject_id])->one();
            $model->subjects = $subject['title'];

            if ($model->save()) {
                return $this->redirect(['thanks']);
            } else {
                echo 'Please contact support';
            }


        } else {
//            print_r($model->getErrors());
            return $this->render('index', [
                'model' => $model,
                'courses' => $course,
                'pageContent' => $pageContent
            ]);
        }
    }


    public function actionThanks()
    {
        return $this->render('thanks', [
        ]);
    }


    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success',
                    'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionEducation()
    {
        return $this->render('education');
    }

    public function actionCareers()
    {
        return $this->render('careers');
    }

    public function actionGitcYerevan()
    {
        return $this->render('gitc-yerevan');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }


    //Set Language
    public function actionLanguage()
    {
        if (Yii::$app->request->post()) {
            Yii::$app->language = Yii::$app->request->post('lang');
            Yii::$app->session->set('language', Yii::$app->request->post('lang'));
            $cookie = new Cookie([
                'name' => 'language',
                'value' => Yii::$app->request->post('lang')
            ]);
            $cookie->expire = time() + (60 * 60 * 24 * 365); // (1 year)
            Yii::$app->getResponse()->getCookies()->add($cookie);

        }
    }


    public function actionPage($slug)
    {
        if ($slug) {

            //Getting current news for displaying
            $thread = Pages::find()->where(['slug' => $slug, 'is_active' => 1])->one();
            $content = json_decode($thread->content, true);
            $media = [];
            if ($slug == 'about') {
                $media = Press::find()->limit(4)->orderBy(['id' => SORT_DESC])
                    ->asArray()->all();
                foreach ($media as $index => $m) {
                    $m_content = json_decode($m['content'], true);
                    $media[$index]['content'] = $m_content[\Yii::$app->language];;
                }

            }
            $langContent = $content[\Yii::$app->language];
            if ($thread) {
                return $this->render('page', [
                    'thread' => $thread,
                    'content' => $langContent,
                    'media' => $media,
                    'slug' => $slug
                ]);
            } else {
                return $this->redirect('/site/index');
            }
        } else {
            return $this->redirect('/site/index');
        }


    }

}
