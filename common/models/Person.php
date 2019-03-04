<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property string $fname
 * @property string $passport
 * @property string $address
 * @property integer $phone
 * @property string $e-mail
 * @property string $languages
 * @property string $occupation
 * @property string $family_condition
 * @property string $profile
 * @property string $technical_languages
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'passport', 'phone', 'e-mail'], 'required'],
            [['phone'], 'integer'],
            [['languages', 'occupation', 'family_condition', 'technical_languages'], 'string'],
            [['name', 'surname', 'fname', 'passport', 'address', 'e-mail', 'profile'], 'string', 'max' => 255],
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
            'surname' => Yii::t('app', 'Surname'),
            'fname' => Yii::t('app', 'Fname'),
            'passport' => Yii::t('app', 'Passport'),
            'address' => Yii::t('app', 'Address'),
            'phone' => Yii::t('app', 'Phone'),
            'e-mail' => Yii::t('app', 'E Mail'),
            'languages' => Yii::t('app', 'Languages'),
            'occupation' => Yii::t('app', 'Occupation'),
            'family_condition' => Yii::t('app', 'Family Condition'),
            'profile' => Yii::t('app', 'Profile'),
            'technical_languages' => Yii::t('app', 'Technical Languages'),
        ];
    }
}
