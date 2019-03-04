<?php



namespace common\models;



use Yii;



/**

 * This is the model class for table "work_place".

 *


 * @property string $id


 * @property string $name


 * @property string $link


 * @property string $sort_id

 */

class WorkPlace extends \yii\db\ActiveRecord

{

    /**

     * @inheritdoc

     */

    public static function tableName()

    {

        return 'work_place';

    }




    /**

     * @inheritdoc

     */

    public function rules()

    {

        return [
            [['sort_id'], 'integer'],
            [['name', 'link'], 'string', 'max' => 255],
        ];

    }



    /**

     * @inheritdoc

     */

    public function attributeLabels()

    {

        return [


            'id' => Yii::t('app', 'ID'),


            'name' => Yii::t('app', 'Name'),


            'link' => Yii::t('app', 'Link'),


            'sort_id' => Yii::t('app', 'Sort ID'),


        ];

    }



}

