<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14/05/16
 * Time: 16:28
 */

namespace frontend\widgets;

use common\models\Result;
use yii\base\Widget;

class ResultWidget extends Widget
{

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $result = Result::find()->asArray()->all();
        return $this->render('resultWidget',['result'=>$result]);
    }
}
