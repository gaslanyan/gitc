<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "classified_guest".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property integer $phone
 */
class ClassifiedGuest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'classified_guest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'email', 'phone'], 'required'],
            [['id'], 'integer'],
            [['name', 'email'], 'string', 'max' => 100],
            ['email', 'email'],
            [['phone'], 'integer']
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
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
        ];
    }
}
