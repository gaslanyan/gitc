<?php


namespace common\models;

use Yii;

/**
 * This is the model class for table "type".
 *

 * @property integer $id


 * @property string $title



 */
class Type extends \yii\db\ActiveRecord

{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'type';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 32],
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


        ];
    }


}
