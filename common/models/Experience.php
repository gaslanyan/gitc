<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "experience".
 *
 * @property integer $id
 * @property string $employed_work_place
 * @property string $years_ex
 * @property string $employed_as
 * @property integer $person_id
 */
class Experience extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'experience';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['person_id'], 'integer'],
            [['employed_work_place', 'employed_as'], 'string', 'max' => 255],
            [['years_ex'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'employed_work_place' => Yii::t('app', 'Employed Work Place'),
            'years_ex' => Yii::t('app', 'Years Ex'),
            'employed_as' => Yii::t('app', 'Employed As'),
            'person_id' => Yii::t('app', 'Person ID'),
        ];
    }
}
