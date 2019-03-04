<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Html;

/**
 * DependentController digunakan ketika ingin mengelola alamat : negara, wilayah, kota.
 * 
 * @author Devi Ardiana <deviardn@gmail.com>
 * @since version 1.0
 */
class DependentController extends Controller {
    
    /* Get Region by Country */
    public function actionGetregion($id){
        $rows = \common\models\Region::find()->where(['country_id' => $id, 'is_status' => 1])->all();
        echo "<option value=''>".Yii::t('app', '-- Select Region --')."</option>";
        
        if(count($rows)>0){
            foreach ($rows as $row){
                echo "<option value='$row->id'>$row->region</option>";
            }
        }else{
            echo "";
        }
    }
    
    /* Gte city by region*/
    public function actionGetcity($id){
        $rows = \common\models\City::find()->where(['region_id' => $id, 'is_status' => 1])->all();
        echo "<option value=''>".Yii::t('app', '-- Select City --')."</option>";
        if(count($rows) > 0){
            foreach ($rows as $row){
                echo "<option value='$row->id'>$row->city</option>";
            }
        }else{
            echo "";
        }
    }

    /* Get Categories */
    public function actionGetcategory($id){
        $rows = \common\models\Category::find()->where(['main_category_id' => $id, 'is_status' => 1])->all();
        echo "<option value=''>".Yii::t('app', '-- Select Category --')."</option>";

        if(count($rows)>0){
            foreach ($rows as $row){
                echo "<option value='$row->id'>$row->category</option>";
            }
        }else{
            echo "";
        }
    }
    
}