<?php

namespace backend\models;

use Yii;
use dektrium\user\models\Profile as baseProfile;

class Profile extends baseProfile {

    //public $image_profile;

    public $fileProfile;
    public $fileHeader;

    public function rules() {
        
        return [
            'bioString' => ['bio', 'string'],
            'publicEmailPattern' => ['public_email', 'email'],
            'gravatarEmailPattern' => ['gravatar_email', 'email'],
            'websiteUrl' => ['website', 'url'],
            'nameLength' => ['name', 'string', 'max' => 255],
            'publicEmailLength' => ['public_email', 'string', 'max' => 255],
            'gravatarEmailLength' => ['gravatar_email', 'string', 'max' => 255],
            'locationLength' => ['location', 'string', 'max' => 255],
            'websiteLength' => ['website', 'string', 'max' => 255],
            
            [['gender', 'phone_number', 'country_id', 'region_id', 'city_id'], 'integer'],
           // [['fileProfile', 'fileHeader'], 'safe'],
            [['fileProfile', 'fileHeader'], 'file', 'extensions' => 'jpg, gif, png'],
            [['facebook_url', 'twitter_url', 'instagram_url'], 'url'],
        ];
//        $rules = parent::rules();
//
//        $rules[] = [
//            [['gender', 'phone_number', 'country_id', 'region_id', 'city_id'], 'integer'],
//            [['fileProfile', 'fileHeader'], 'safe'],
//            [['fileProfile', 'fileHeader'], 'file', 'extensions' => 'jpg, gif, png'],
//            [['facebook_url', 'twitter_url', 'instagram_url'], 'url'],
//        ];
//
//        return $rules;
    }

    public function attributeLabels() {
        
         return [
            'name'           => Yii::t('user', 'Name'),
            'public_email'   => Yii::t('user', 'Email (public)'),
            'gravatar_email' => Yii::t('user', 'Gravatar email'),
            'location'       => Yii::t('user', 'Location'),
            'website'        => Yii::t('user', 'Website'),
            'bio'            => Yii::t('user', 'Bio'),
            'country_id'     => Yii::t('user', 'Country'),
            'region_id'      => Yii::t('user', 'Region'),
            'city_id'        => Yii::t('user', 'City'),
            'phone_number'   => Yii::t('user', 'Phone number'),
            'fileProfile'    => Yii::t('user', 'Image profile'),
            'fileHeader'     => Yii::t('user', 'Image header'),
            'facebook_url'   => Yii::t('user', 'Facebook url'),
            'twitter_url'    => Yii::t('user', 'Twitter url'),
            'instagram_url'  => Yii::t('user', 'Instagram url'),
            'gender'         => Yii::t('user', 'Gender'),
        ];
        
//        $attributeLabels = parent::attributeLabels();
//
//        $attributeLabels[] = [
//            'country_id' => Yii::t('user', 'Country'),
//            'region_id' => Yii::t('user', 'Region'),
//            'city_id' => Yii::t('user', 'City'),
//            'phone_number' => Yii::t('user', 'Phone number'),
//            'fileProfile' => Yii::t('user', 'Image profile'),
//            'fileHeader' => Yii::t('user', 'Image header'),
//            'facebook_url' => Yii::t('user', 'Facebook url'),
//            'twitter_url' => Yii::t('user', 'Twitter url'),
//            'instagram_url' => Yii::t('user', 'Instagram url'),
//            'gender' => Yii::t('user', 'Gender'),
//        ];
//        
//        return $attributeLabels;
    }

}
