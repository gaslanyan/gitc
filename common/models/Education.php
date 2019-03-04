<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "education".
 *
 * @property integer $id
 * @property string $university
 * @property integer $years_e
 * @property string $profession
 * @property integer $person_id
 */
class Education extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'education';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['years_e', 'person_id'], 'integer'],
            [['university', 'profession'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'university' => Yii::t('app', 'University'),
            'years_e' => Yii::t('app', 'Years E'),
            'profession' => Yii::t('app', 'Profession'),
            'person_id' => Yii::t('app', 'Person ID'),
        ];
    }
}
