<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "alumni".
 *
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property string $fname
 * @property string $birthday
 * @property string $address
 * @property integer $phone
 * @property string $e_mail
 * @property string $languages
 * @property string $occupation
 * @property string $family_condition
 * @property string $graduate_year
 * @property string $technical_languages
 * @property string $education
 * @property string $experience
 * @property string $skills
 * @property string $lng_code
 * @property string $profession
 */
class Alumni extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'alumni';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'birthday', 'phone', 'e_mail', 'languages', 'technical_languages', 'education', 'lng_code'], 'required'],
            [['phone'], 'integer'],
            [['occupation', 'family_condition', 'education', 'experience', 'skills', 'profession'], 'string'],
            [['name', 'surname', 'fname', 'birthday', 'address', 'e_mail', 'graduate_year', ], 'string', 'max' => 255],
            [['lng_code'], 'string', 'max' => 3],
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
            'birthday' => Yii::t('app', 'Birthday'),
            'address' => Yii::t('app', 'Address'),
            'phone' => Yii::t('app', 'Phone'),
            'e_mail' => Yii::t('app', 'E Mail'),
            'languages' => Yii::t('app', 'Languages'),
            'occupation' => Yii::t('app', 'Occupation'),
            'family_condition' => Yii::t('app', 'Family Condition'),
            'graduate_year' => Yii::t('app', 'Graduate Year'),
            'technical_languages' => Yii::t('app', 'Technical Languages'),
            'education' => Yii::t('app', 'Education'),
            'experience' => Yii::t('app', 'Experience'),
            'skills' => Yii::t('app', 'Skills'),
            'lng_code' => Yii::t('app', 'Lng Code'),
            'profession' => Yii::t('app', 'Profession'),
        ];
    }
}
