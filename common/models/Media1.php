<?php



namespace common\models;



use Yii;



/**

 * This is the model class for table "media".

 *
 * @property integer $id
 * @property string $name
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
            [['name'], 'required'],
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


        ];

    }



}

