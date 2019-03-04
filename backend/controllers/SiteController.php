<?php
namespace backend\controllers;

use backend\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {

        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {

//        $user = User::findIdentity(Yii::$app->user->id);
//
//        if($user->role != self::USER_ADMIN){
//            return $this->redirect(Url::to(Yii::$app->urlManagerFrontEnd->createUrl(['/site/index'])));
//        }
        return $this->render('index');
    }
}
