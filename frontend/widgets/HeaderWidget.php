<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14/05/16
 * Time: 16:28
 */

namespace frontend\widgets;

use common\models\Enroll;
use common\models\Training;
use frontend\components\Helper;
use yii\base\Widget;

class HeaderWidget extends Widget
{
    public $title;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('headerWidget');
    }

}
