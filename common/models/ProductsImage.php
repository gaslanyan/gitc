<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products_image".
 *
 * @property integer $id
 * @property string $image
 * @property integer $product_id
 */
class ProductsImage extends \yii\db\ActiveRecord
{

    //public $file;
    public $imageFile;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['imageFile'], 'safe'],
            [['imageFile'], 'file', 'extensions'=>'jpg, gif, png', 'maxSize'=> 1000000], //max 1 mb
            [['imageFile'], 'image'],
            // [['id'], 'required'],
            // [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
            [['product_id'], 'integer'],
            [['image'], 'string', 'max' => 255],
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'product_id' => 'Product ID',
        ];
    }
}
