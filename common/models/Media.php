<?php



namespace common\models;



use Yii;



/**

 * This is the model class for table "media".

 *


 * @property integer $id


 * @property string $name


 * @property integer $type_id



 */

class Media extends \yii\db\ActiveRecord

{

    /**

     * @inheritdoc

     */
    public $files;
    public static function tableName()

    {

        return 'media';

    }




    /**

     * @inheritdoc

     */

    public function rules()

    {

        return [
            [['name', 'type_id'], 'required'],
            [['type_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['files'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 5],
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


            'type_id' => Yii::t('app', 'Type ID'),


        ];

    }



}

