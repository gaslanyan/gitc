<?php
namespace frontend\components;

use Yii;
use yii\base\Behavior;
use yii\web\Application;

class CheckLang extends Behavior{
    public function events()
    {
        return [
            Application::EVENT_BEFORE_REQUEST => 'checkLang'
        ];
    }

    public function checkLang(){

        // Set the application language if provided by GET, session or cookie
//        print_r(Yii::$app->urlManager->rules);exit;
        if (isset($_GET['language'])) {
            Yii::$app->language = $_GET['language'];
            Yii::$app->session->set('language', $_GET['language']);
            $cookie = new \yii\web\Cookie([
                'name' => 'language',
                'value' => $_GET['language'],
            ]);
            $cookie->expire = time() + (60 * 60 * 24 * 365); // (1 year)
            Yii::$app->response->cookies->add($cookie);
        } else if (Yii::$app->session->has('language')){
            Yii::$app->language = Yii::$app->session->get('language');
        } else if (isset(Yii::$app->request->cookies['language'])){
            Yii::$app->language = Yii::$app->request->cookies['language']->value;
        }



//        if (Yii::$app->getRequest()->getCookies()->has('lang')) {
////            echo Yii::$app->getRequest()->getCookies()->getValue('lang');exit;
//            Yii::$app->language = Yii::$app->getRequest()->getCookies()->getValue('lang');
////            echo Yii::$app->language;exit;
//        }
    }
}