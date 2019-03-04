<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14/05/16
 * Time: 16:28
 */

namespace frontend\widgets;

use yii\base\Widget;

class MapWidget extends Widget
{

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('mapWidget');
    }
}
