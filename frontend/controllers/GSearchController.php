<?php

namespace frontend\controllers;

use Yii;

class GSearchController extends \yii\web\Controller
{
    public function actionGsearch() {
        
        $searchModel = new \common\models\search\GSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('_gsearch', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    //'sort' => $sort,
        ]);
    }

}
