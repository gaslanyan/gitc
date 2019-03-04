<?php
namespace frontend\components;

use Yii;
use yii\web\UrlManager;

class MyUrlManager extends UrlManager{
    
    public function createUrl($params)
    {

        if (!isset($params['language'])) {
            if (Yii::$app->session->has('language'))
                Yii::$app->language = Yii::$app->session->get('language');
            else if(isset(Yii::$app->request->cookies['language']))
                Yii::$app->language = Yii::$app->request->cookies['language']->value;
            $params['language']=Yii::$app->language;
        }
//        parent::createUrl($params);
//        print_r($params);exit;
        return parent::createUrl($params);
    }
}