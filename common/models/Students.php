<?php


namespace common\models;

use Yii;

/**
 * This is the model class for table "students".
 *

 * @property integer $id


 * @property string $img_name


 * @property string $content


 * @property string $link



 */
class Students extends \yii\db\ActiveRecord

{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['img_name'], 'required'],
            [['content'], 'string'],
            [['img_name', 'link'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [

            'id' => Yii::t('app', 'ID'),


            'img_name' => Yii::t('app', 'Img Name'),


            'content' => Yii::t('app', 'Content'),


            'link' => Yii::t('app', 'Link'),


        ];
    }


}
