<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;
use yii\db\Query;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $title
 * @property integer $category_id
 * @property resource $content
 * @property string $created_at
 * @property string $updated_at
 * @property string $slug
 * @property integer $is_active
 * @property integer $sort_id
 * @property Category $category
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'immutable' => true,
                'ensureUnique' => true,
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
            [['title', 'is_active','sort_id'], 'required'],
            [['category_id', 'is_active', 'created_at', 'updated_at','sort_id'], 'integer'],
            [['content'], 'string'],
            [['title', 'slug'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'sort_id' => Yii::t('app', 'Sort ID'),
            'title' => Yii::t('app', 'Title - In English'),
            'category_id' => Yii::t('app', 'Category ID'),
            'content' => Yii::t('app', 'Content'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'slug' => Yii::t('app', 'Slug'),
            'is_active' => Yii::t('app', 'Is Active'),
        ];
    }

    public function getHomeNews()
    {
        $q = [];
        $subQuery = (new Query())->select('DATE_FORMAT(FROM_UNIXTIME(`created_at`), \'%Y\') as `_data`')->from('news')->orderBy(['_data' => SORT_DESC])->groupBy(['_data']);
        foreach ($subQuery->each() as $index => $item) {
            $d = $item['_data'];
            $query = (new Query())->select('*')->from('news')->where("DATE_FORMAT(FROM_UNIXTIME(`created_at`), '%Y') = $d ")->limit(4);
            $cont = $query->all();
            foreach ($cont as $k => $v) {
                $cont[$k]['content'] = json_decode($v['content']);
            }
            $q[$d] = $cont;
        }
        return $q;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
