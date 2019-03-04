<?php



namespace common\models;



use Yii;



/**

 * This is the model class for table "projects".

 *


 * @property integer $id


 * @property string $title


 * @property string $content


 * @property string $is_active


 * @property string $slug


 * @property string $video

 * @property string $img_name

 *@property integer $sort_id

 */

class Projects extends \yii\db\ActiveRecord

{

    /**

     * @inheritdoc

     */

    public static function tableName()

    {

        return 'projects';

    }




    /**

     * @inheritdoc

     */

    public function rules()

    {

        return [
            [['title', 'is_active', 'slug','img_name','sort_id'], 'required'],
            [['sort_id'], 'integer'],
            [['content', 'is_active'], 'string'],
            [['title', 'slug', 'video', 'img_name'], 'string', 'max' => 255],
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


            'content' => Yii::t('app', 'Content'),


            'is_active' => Yii::t('app', 'Is Active'),


            'slug' => Yii::t('app', 'Slug'),


            'video' => Yii::t('app', 'Video'),

            'img_name' => Yii::t('app', 'Img Name'),

            'sort_id' => Yii::t('app', 'Sort ID'),
        ];

    }



}

