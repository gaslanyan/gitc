<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "enroll".
 *
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * @property string $dob
 * @property string $phone
 * @property string $email
 * @property integer $course_id
 * @property string $subjects
 */
class Enroll extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'enroll';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                ['firstname', 'lastname', 'dob', 'phone'],
                'required',
                'message' => Yii::t('app', 'Required field')
            ],
            [['dob'], 'safe', 'message' => '{attribute}' . Yii::t('app', ' is required')],
            [['phone'], 'number', 'message' => '{attribute}' . Yii::t('app', ' is required')],
            [['course_id'], 'integer'],
            [['subjects'], 'string', 'message' => 'required'],
            [['firstname', 'lastname'], 'string', 'max' => 80],
            [['email'], 'string', 'max' => 70],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'firstname' => Yii::t('app', 'Firstname'),
            'lastname' => Yii::t('app', 'Lastname'),
            'state' => Yii::t('app', 'State'),
            'city' => Yii::t('app', 'City'),
            'dob' => Yii::t('app', 'Dob'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'course_id' => Yii::t('app', 'Course'),
            'subjects' => Yii::t('app', ''),
        ];
    }
}
