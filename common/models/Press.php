<?php


namespace common\models;

use Yii;

/**
 * This is the model class for table "press".
 *

 * @property integer $id


 * @property string $title


 * @property string $content


 * @property string $img_name


 * @property string $video


 * @property string $date



 */
class Press extends \yii\db\ActiveRecord

{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'press';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['date'], 'safe'],
            [['title', 'img_name', 'video'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [

            'id' => Yii::t('app', 'ID'),


            'title' => Yii::t('app', 'Title'),


            'content' => Yii::t('app', 'Content'),


            'img_name' => Yii::t('app', 'Img Name'),


            'video' => Yii::t('app', 'Video'),


            'date' => Yii::t('app', 'Date'),


        ];
    }


}
