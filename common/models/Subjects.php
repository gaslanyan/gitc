<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "subjects".
 *
 * @property integer $id
 * @property string $title
 * @property string $title_hy
 * @property integer $course_id
 * @property integer $is_status
 */
class Subjects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subjects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'title_hy', 'course_id', 'is_status'], 'required'],
            [['course_id', 'is_status'], 'integer'],
            [['title', 'title_hy'], 'string', 'max' => 255],
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
            'title_hy' => Yii::t('app', 'Title Hy'),
            'course_id' => Yii::t('app', 'Course ID'),
            'is_status' => Yii::t('app', 'Is Status'),
        ];
    }
}
