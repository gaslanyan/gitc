<?php


namespace common\models;

use Yii;

/**
 * This is the model class for table "result".
 *

 * @property integer $id


 * @property string $name


 * @property integer $persent


 * @property integer $count



 */
class Result extends \yii\db\ActiveRecord

{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'result';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['persent', 'count'], 'integer'],
            [['name'], 'string', 'max' => 30],
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


            'persent' => Yii::t('app', 'Persent'),


            'count' => Yii::t('app', 'Count'),


        ];
    }


}
