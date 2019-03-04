<?php
/*
 * This file is part of the Dektrium project
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View 					$this
 * @var dektrium\user\models\User 		$user
 * @var dektrium\user\models\Profile 	$profile
 */
?>

<?php $this->beginContent('@dektrium/user/views/admin/update.php', ['user' => $user]) ?>

<?php
$form = ActiveForm::begin([
            'layout' => 'horizontal',
            'enableAjaxValidation' => true,
            'enableClientValidation' => false,
            'fieldConfig' => [
                'horizontalCssClasses' => [
                    'wrapper' => 'col-sm-9',
                ],
            ],
            'options' => ['enctype' => 'multipart/form-data'],
        ]);
?>

<?= $form->field($profile, 'name') ?>

<?= $form->field($profile, 'gender')->dropDownList(['1' => 'Male', '2' => 'Female'], ['prompt' => '-- Select gender --']) ?>

<?= $form->field($profile, 'public_email') ?>

<?= $form->field($profile, 'phone_number') ?>

<?= $form->field($profile, 'website') ?>

<?php // echo $form->field($profile, 'location')  ?>

<!-- Country -->
<?php $listDataCountry = yii\helpers\ArrayHelper::map(common\models\Country::find()->where(['is_status' => 1])->all(), 'id', 'country') ?>

<?=
$form->field($profile, 'country_id', ['inputOptions' => ['class' => 'form-control']])->dropDownList($listDataCountry, [
    'prompt' => Yii::t('app', '-- Select Country --'),
    'onchange' => '
                            $.get("' . yii\helpers\Url::toRoute(['dependent/getregion']) . '", { id: $(this).val() })
                                .done(function(data){
                                    $("#' . Html::getInputId($profile, 'region_id') . '").html( data );
                                });'
]);
?>

<!-- Region -->
<?php $listDataRegion = yii\helpers\ArrayHelper::map(common\models\Region::find()->all(), 'id', 'region') ?>



<?php
echo $form->field($profile, 'region_id')->dropDownList($listDataRegion, [
    'prompt' => '-- Select Region --',
    'onchange' => '
                            $.get("' . yii\helpers\Url::toRoute(['dependent/getcity']) . '", { id: $(this).val() })
                                .done(function(data){
                                    $("#' . Html::getInputId($profile, 'city_id') . '").html( data );
                                });'
]);
?>

<!-- City -->
<?php $listDataCity = \yii\helpers\ArrayHelper::map(\common\models\City::find()->all(), 'id', 'city') ?>

<?php
if (isset($profile->city_id)) {
    echo $form->field($profile, 'city_id')->dropDownList($listDataCity, ['prompt' => '-- Select City --']);
} else {
    echo $form->field($profile, 'city_id')->dropDownList(['prompt' => Yii::t('app', '--- Select City ---')]);
}
?>

<?php // echo $form->field($profile, 'gravatar_email')->hint(\yii\helpers\Html::a(Yii::t('user', 'Change your avatar at Gravatar.com'), 'http://gravatar.com'))  ?>

<?= $form->field($profile, 'bio')->textarea(['rows' => 5]) ?>

<?= $form->field($profile, 'facebook_url') ?>

<?= $form->field($profile, 'twitter_url') ?>

<?= $form->field($profile, 'instagram_url') ?>

<?= $form->field($profile, 'fileProfile')->fileInput(); ?>

<div class="form-group">
    <div class="col-lg-3">

    </div>
    <div class="col-lg-9">
        <?php
        if ($profile->image_profile) {
            echo '<img src="'.$profile->image_profile.'" width="90px">&nbsp;&nbsp;&nbsp;';
            echo Html::a('Delete Image', ['deleteimg', 'id' => $profile->user_id, 'field' => 'image_profile'], ['class' => 'btn btn-danger']) . '<p>';
        }
        ?>  
    </div>
</div>


<div class="form-group">
    <div class="col-lg-offset-3 col-lg-9">
        <?= Html::submitButton(Yii::t('user', 'Update'), ['class' => 'btn btn-block btn-success']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>

<?php $this->endContent() ?>
