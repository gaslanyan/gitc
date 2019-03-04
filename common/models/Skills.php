<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "skills".
 *
 * @property integer $id
 * @property string $works
 * @property integer $person_id
 */
class Skills extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'skills';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['person_id'], 'integer'],
            [['works'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'works' => Yii::t('app', 'Works'),
            'person_id' => Yii::t('app', 'Person ID'),
        ];
    }
}
