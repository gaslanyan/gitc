<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "main_category".
 *
 * @property integer $id
 * @property string $main_category
 * @property string $icon
 * @property string $create_at
 * @property string $update_at
 * @property integer $is_status
 */
class MainCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'main_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['main_category', 'icon', 'create_at', 'update_at', 'is_status'], 'required'],
            [['create_at', 'update_at'], 'safe'],
            [['is_status'], 'integer'],
            [['main_category', 'icon'], 'string', 'max' => 50],
            [['main_category'], 'unique', 'message' => 'Main Category is already exist.'],
            [['icon'], 'unique', 'message' => 'Icon is already exist.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'main_category' => Yii::t('app', 'Main Category'),
            'icon' => Yii::t('app', 'Icon'),
            'create_at' => Yii::t('app', 'Create At'),
            'update_at' => Yii::t('app', 'Update At'),
            'is_status' => Yii::t('app', 'Status'),
        ];
    }
    
    public function beforeDelete() {
        if (parent::beforeDelete()) {
            Category::deleteAll('main_category_id = '.$this->id);
            return true;
        } else {
            return false;
        }
    }
}
