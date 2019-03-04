<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14/05/16
 * Time: 16:28
 */

namespace frontend\widgets;

use common\models\Media;
use common\models\Menu;
use common\models\Slider;
use yii\base\Widget;

class MediaWidget extends Widget
{

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $media = Slider::find()->asArray()->one();

        return $this->render('mediaWidget', ['media' => json_decode($media['name'])]);
    }
}
