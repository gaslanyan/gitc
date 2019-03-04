<?php



namespace common\models;



use Yii;



/**

 * This is the model class for table "training".

 *


 * @property string $id


 * @property string $title


 * @property string $img_name


 * @property string $status


 * @property string $content


 * @property integer $created_at


 * @property integer $updated_at


 * @property string $icon


 * @property integer $is_active


 * @property string $slug


 * @property integer $sort_id

 */

class Training extends \yii\db\ActiveRecord

{

    /**

     * @inheritdoc

     */

    public static function tableName()

    {

        return 'training';

    }




    /**

     * @inheritdoc

     */

    public function rules()

    {

        return [
            [['status', 'content'], 'string'],
            [['created_at', 'updated_at', 'is_active','sort_id'], 'integer'],
            [['title', 'img_name', 'icon', 'slug'], 'string', 'max' => 255],
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


            'img_name' => Yii::t('app', 'Img Name'),


            'status' => Yii::t('app', 'Status'),


            'content' => Yii::t('app', 'Content'),


            'created_at' => Yii::t('app', 'Created At'),


            'updated_at' => Yii::t('app', 'Updated At'),


            'icon' => Yii::t('app', 'Icon'),


            'is_active' => Yii::t('app', 'Is Active'),


            'slug' => Yii::t('app', 'Slug'),


            'sort_id' => Yii::t('app', 'Sort ID'),
        ];

    }



}

