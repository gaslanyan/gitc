<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14/05/16
 * Time: 16:28
 */

namespace backend\widgets;

use common\models\Media;
use common\models\Type;
use common\models\Menu;
use Yii;
use yii\base\Widget;

class MediaWidget extends Widget
{

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $type = Yii::$app->controller->id;
        if($type=="pages")
            $type="staff";
        $type_id = Type::find()->where(['title'=>$type])->asArray()->one();
        $media = Media::find()->where(['type_id'=>$type_id['id']])->asArray()->all();
        return $this->render('mediaWidget', ['media' => $media]);
    }
}
