<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Html;

class DependentController extends Controller {
    
    /* get region by Country */
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
    
    /* gte city by Region */
    public function actionGetcity($id){
        $rows = \common\models\City::find()->where(['region_id' => $id, 'is_status' => 1])->all();

        echo Yii::t('app', '-- Choose city --') . '<br>';
        
        
        if(count($rows) > 0){
            echo '<select class="form-control" name="Enroll[city]">';
            foreach ($rows as $row){
                echo "<option value='$row->id'>". Yii::t('app', $row->city) ."</option>";
            }
            echo "</select>";
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


    /* Get Categories */
    public function actionGetsubjects($id){
        $rows = \common\models\Subjects::find()->where(['course_id' => $id, 'is_status' => 1])->all();
        echo Yii::t('app', '-- Choose Subjects --') . '<br>';

        if(count($rows)>0){
            foreach ($rows as $row){
                echo "<div class='form-control'><input type='checkbox' name='subjects[$row->id]' value='$row->id'>$row->title</div><br>";
               // echo "<option value='$row->id'>$row->title</option>";
            }
        }else{
            echo "";
        }
    }

}