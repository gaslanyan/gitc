<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "region".
 *
 * @property integer $id
 * @property string $region
 * @property integer $country_id
 * @property string $description
 * @property string $img_name
 * @property string $create_at
 * @property string $update_at
 * @property integer $is_status
 * @property integer $sort
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'region';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['region', 'country_id', 'create_at', 'update_at', 'is_status'], 'required'],
            [['country_id', 'is_status','sort'], 'integer'],
            [['create_at', 'update_at'], 'safe'],
            [['region'], 'string', 'max' => 50],
            [['img_name'], 'string', 'max' => 255],
            [['description'], 'string'],
            [['region', 'country_id'], 'unique', 'targetAttribute' => ['region', 'country_id'], 'message' => 'The combination of Country Name and Region has already exist.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'region' => Yii::t('app', 'Region'),
            'country_id' => Yii::t('app', 'Country'),
            'description' => Yii::t('app', 'Description'),
            'img_name' => Yii::t('app', 'Image Name'),
            'sort' => Yii::t('app', 'Sort'),
            'create_at' => Yii::t('app', 'Create At'),
            'update_at' => Yii::t('app', 'Update At'),
            'is_status' => Yii::t('app', 'Status'),
        ];
    }
    
    public function getCountry(){
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }
    
     public function beforeDelete() {
        if (parent::beforeDelete()) {
            City::deleteAll('region_id = '.$this->id);
            return true;
        } else {
            return false;
        }
    }
}
