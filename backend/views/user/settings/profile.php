<?php
/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;

/*
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\Profile $profile
 */

$this->title = Yii::t('user', 'Profile settings');
?>

<?php echo $this->render('_alert', ['module' => Yii::$app->getModule('user')]) ?>

<div class="row">
    <div class="col-md-3">
        <?= $this->render('_menu') ?>
    </div>
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header">
                <?= Html::encode($this->title) ?>
            </div>
            <div class="box-body">
                <?php
                $form = \yii\widgets\ActiveForm::begin([
                            'id' => 'profile-form',
                            'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
                            'fieldConfig' => [
                                'template' => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-lg-9\">{error}\n{hint}</div>",
                                'labelOptions' => ['class' => 'col-lg-3 control-label'],
                            ],
                            'enableAjaxValidation' => true,
                            'enableClientValidation' => false,
                            'validateOnBlur' => false,
                ]);
                ?>

                <?= $form->field($model, 'name') ?>
                
                <?= $form->field($model, 'gender')->dropDownList(['1' => 'Male', '2' => 'Female'], ['prompt' => '-- Select gender --']) ?>

                <?= $form->field($model, 'public_email') ?>

                <?= $form->field($model, 'phone_number') ?>

                <?= $form->field($model, 'website') ?>

                <?php // echo $form->field($model, 'location')  ?>

                <!-- Country -->
                <?php $listDataCountry = yii\helpers\ArrayHelper::map(common\models\Country::find()->where(['is_status' => 1])->all(), 'id', 'country') ?>

                <?=
                $form->field($model, 'country_id', ['inputOptions' => ['class' => 'form-control']])->dropDownList($listDataCountry, [
                    'prompt' => Yii::t('app', '-- Select Country --'),
                    'onchange' => '
                            $.get("' . yii\helpers\Url::toRoute(['dependent/getregion']) . '", { id: $(this).val() })
                                .done(function(data){
                                    $("#' . Html::getInputId($model, 'region_id') . '").html( data );
                                });'
                ]);
                ?>

                <!-- Region -->
                <?php $listDataRegion = yii\helpers\ArrayHelper::map(common\models\Region::find()->all(), 'id', 'region') ?>



                <?php
                echo $form->field($model, 'region_id')->dropDownList($listDataRegion, [
                    'prompt' => '-- Select Region --',
                    'onchange' => '
                            $.get("' . yii\helpers\Url::toRoute(['dependent/getcity']) . '", { id: $(this).val() })
                                .done(function(data){
                                    $("#' . Html::getInputId($model, 'city_id') . '").html( data );
                                });'
                ]);
                ?>

                <!-- City -->
                <?php $listDataCity = \yii\helpers\ArrayHelper::map(\common\models\City::find()->all(), 'id', 'city') ?>

                <?php
                if (isset($model->city_id)) {
                    echo $form->field($model, 'city_id')->dropDownList($listDataCity, ['prompt' => '-- Select City --']);
                } else {
                    echo $form->field($model, 'city_id')->dropDownList(['prompt' => Yii::t('app', '--- Select City ---')]);
                }
                ?>

                <?php // echo $form->field($model, 'gravatar_email')->hint(\yii\helpers\Html::a(Yii::t('user', 'Change your avatar at Gravatar.com'), 'http://gravatar.com'))  ?>

                <?= $form->field($model, 'bio')->textarea(['rows' => 5]) ?>
                
                <?= $form->field($model, 'facebook_url') ?>
                
                <?= $form->field($model, 'twitter_url') ?>
                
                <?= $form->field($model, 'instagram_url') ?>

                <?php //echo $form->field($model, 'image_profile') ?>

                <?= $form->field($model, 'fileProfile')->fileInput(); ?>

                <div class="form-group">
                    <div class="col-lg-3">

                    </div>
                    <div class="col-lg-9">
                        <?php
                        if ($model->image_profile) {
                            echo '<img src="' . \Yii::$app->request->BaseUrl . '/' . $model->image_profile . '" width="90px">&nbsp;&nbsp;&nbsp;';
                            echo Html::a('Delete Image', ['deleteimg', 'id' => $model->user_id, 'field' => 'image_profile'], ['class' => 'btn btn-danger']) . '<p>';
                        }
                        ?>  
                    </div>
                </div>
                
                <div class = "form-group">
                    <div class = "col-lg-offset-3 col-lg-9">
                        <?= \yii\helpers\Html::submitButton(Yii::t('user', 'Save'), ['class' => 'btn btn-block btn-primary'])
                        ?><br>
                    </div>
                </div>

                <?php \yii\widgets\ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
