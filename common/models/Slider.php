<?php


namespace common\models;

use Yii;

/**
 * This is the model class for table "slider".
 *

 * @property integer $id


 * @property string $name



 */
class Slider extends \yii\db\ActiveRecord

{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slider';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [

            'id' => Yii::t('app', 'ID'),


            'name' => Yii::t('app', 'Name'),


        ];
    }


}
