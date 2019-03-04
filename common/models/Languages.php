<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "languages".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $icon
 * @property integer $is_active
 */
class Languages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'languages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'code', 'is_active'], 'required'],
            [['is_active'], 'integer'],
            [['name', 'icon'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 25],
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
            'code' => Yii::t('app', 'Code'),
            'icon' => Yii::t('app', 'Icon'),
            'is_active' => Yii::t('app', 'Is Active'),
        ];
    }
}
