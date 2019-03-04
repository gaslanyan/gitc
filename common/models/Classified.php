<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "classified".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $main_category_id
 * @property integer $category_id
 * @property integer $country_id
 * @property integer $region_id
 * @property integer $city_id
 * @property integer $price
 * @property string $create_at
 * @property string $update_at
 * @property integer $user_id
 * @property integer $is_status
 * @property integer $type
 */
class Classified extends \yii\db\ActiveRecord
{
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'classified';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'main_category_id', 'category_id', 'country_id', 'region_id', 'city_id', 'price'], 'required'],
            [['description'], 'string'],
            //[['main_category_id', 'category_id', 'country_id', 'region_id', 'price', 'user_id', 'is_status', 'type'], 'integer'],
            [['create_at', 'update_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['price'], 'number']
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
            'description' => Yii::t('app', 'Description'),
            'main_category_id' => Yii::t('app', 'Main Category'),
            'category_id' => Yii::t('app', 'Category'),
            'country_id' => Yii::t('app', 'Country'),
            'region_id' => Yii::t('app', 'Region'),
            'city_id' => Yii::t('app', 'City'),
            'price' => Yii::t('app', 'Price'),
            'create_at' => Yii::t('app', 'Create At'),
            'update_at' => Yii::t('app', 'Update At'),
            'user_id' => Yii::t('app', 'User ID'),
            'is_status' => Yii::t('app', 'Status'),
            'type' => Yii::t('app', 'Type'),
        ];
    }
    
    // Country
    public function getCountry(){
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }
    
    // Region
    public function getRegion(){
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }
    
    // City
    public function getCity(){
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }
    
    // Main category
    public function getMainCategory(){
        return $this->hasOne(MainCategory::className(), ['id' => 'main_category_id']);
    }
    
    // Category
    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
    
    public function beforeDelete() {
        if (parent::beforeDelete()) {
            
            $dataImage = ClassifiedImage::find()->where(['classified_id' => $this->id])->all();
            
//            foreach($dataImage as $img){
//                unlink($img['image']);
//            }
            
            ClassifiedImage::deleteAll('classified_id = '.$this->id);
            return true;
        } else {
            return false;
        }
    }

}
