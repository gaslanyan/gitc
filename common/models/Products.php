<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $title
 * @property string $keywords
 * @property string $description
 * @property string $content
 * @property string $price_table
 * @property string $technical_details
 * @property integer $main_category_id
 * @property integer $category_id
 * @property integer $price
 * @property string $create_at
 * @property string $update_at
 * @property integer $is_status
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'title', 'content', 'main_category_id', 'category_id', 'price', 'create_at', 'update_at', 'is_status'], 'required'],
            [['id', 'main_category_id', 'category_id', 'price', 'is_status'], 'integer'],
            [['content', 'price_table', 'technical_details'], 'string'],
            [['create_at', 'update_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['keywords'], 'string', 'max' => 500],
            [['description'], 'string', 'max' => 700],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'content' => 'Content',
            'price_table' => 'Price Table',
            'technical_details' => 'Technical Details',
            'main_category_id' => 'Main Category ID',
            'category_id' => 'Category ID',
            'price' => 'Price',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'is_status' => 'Is Status',
        ];
    }
}
