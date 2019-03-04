<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "pages".
 *
 * @property integer $id
 * @property string $title
 * @property integer $active_in_menu
 * @property resource $content
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $slug
 * @property integer $is_active
 */
class Pages extends \yii\db\ActiveRecord
{

    public $img;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages';
    }

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'immutable' => true,
                'ensureUnique'=>true,
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_at',
                'updatedByAttribute' => 'updated_at',
            ],
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'is_active'], 'required'],
            [['active_in_menu', 'created_at', 'updated_at', 'is_active'], 'integer'],
            [['content'], 'string'],
            [['title', 'slug'], 'string', 'max' => 255],
            [['img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg','maxSize'=> 1000000],
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
            'active_in_menu' => Yii::t('app', 'Show in menu?'),
            'content' => Yii::t('app', 'Content'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'slug' => Yii::t('app', 'Slug'),
            'is_active' => Yii::t('app', 'Is Active'),
        ];
    }
}
