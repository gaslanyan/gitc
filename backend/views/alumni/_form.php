<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Alumni */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alumni-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'lng_code')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Languages::find()->where(['is_active' => 1])->
    all(), 'code', 'name'), ['prompt' => '-- Select Site Languages --']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profession')->dropDownList(
        ['Web Developer' => 'Web Developer', 'Java Developer' => 'Java Developer', 'Mobile Developer(iOS)' => 'Mobile Developer(iOS)', 'Mobile Developer(Android)' => 'Mobile Developer(Android)',
            'Web ծրագրավորում' => 'Web ծրագրավորում', 'Java ծրագրավորում' => 'Java ծրագրավորում', 'Մոբայլ ծրագրավորում (Android)' => 'Մոբայլ ծրագրավորում (Android)', 'Մոբայլ ծրագրավորում (iOS)' => 'Mobile Developer(iOS)'], ['prompt' => '']) ?>

<!--    --><?//= $form->field($model, 'passport')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'birthday')->widget(\yii\jui\DatePicker::classname(), [
        'language' => 'en',
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'e_mail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'occupation')->dropDownList(['unemployed' => 'Unemployed', 'employed' => 'Employed', 'freelancer' => 'Freelancer',], ['prompt' => '']) ?>

    <?= $form->field($model, 'family_condition')->dropDownList(['married' => 'Married', 'single' => 'Single',], ['prompt' => '']) ?>

<!--    --><?//= $form->field($model, 'profile')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'graduate_year')->widget(\yii\jui\DatePicker::classname(), [
        'language' => 'en',
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'technical_languages')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Subjects::find()->
    all(), 'title', 'title'), ['multiple' => 'true']) ?>

    <?= $form->field($model, 'languages')->dropDownList(['hy' => 'Armenia', 'en' => 'English', 'ru' => 'Russian', 'de' => 'German', 'fr' => 'French'], ['multiple' => 'true']) ?>


    <fieldset>
        <legend>Education</legend>
        <i class="fa fa-plus-square add_ed"></i>
        <?php if (!empty($model["education"])): ?>
            <?php foreach ($model["education"] as $key => $val): ?>
                <div class="form_item" id="ex_<?= $key ?>">

                    <?= $form->field($model, 'education[' . $key . '][university]', ['labelOptions' => ['label' => 'University']])->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'education[' . $key . '][years]', ["labelOptions" => ["label" => "Education years"]])->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'education[' . $key . '][profession]', ["labelOptions" => ["label" => "Profession"]])->textInput(['maxlength' => true]) ?>

                    <i class="fa fa-remove remove_fields"></i>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="form_item" id="ed_0">

                <?= $form->field($model, 'education[0][university]', ['labelOptions' => ['label' => 'University']])->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'education[0][years]', ["labelOptions" => ["label" => "Education years"]])->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'education[0][profession]', ["labelOptions" => ["label" => "Profession"]])->textInput(['maxlength' => true]) ?>
                <i class="fa fa-remove remove_fields"></i>
            </div>
        <?php endif; ?>


    </fieldset>
    <fieldset>
        <legend>Experience</legend>
        <i class="fa fa-plus-square add_ex"></i>
        <?php if (!empty($model["experience"])): ?>
            <?php foreach ($model["experience"] as $key => $val): ?>
                <div class="form_item" id="ex_<?= $key ?>">

                    <?= $form->field($model, 'experience[' . $key . '][employed_work_place]', ["labelOptions" => ["label" => "Employed work place"]])->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'experience[' . $key . '][years_ex]', ["labelOptions" => ["label" => "Experience years"]])->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'experience[' . $key . '][employed]', ["labelOptions" => ["label" => "Employed"]])->textInput(['maxlength' => true]) ?>

                </div>
            <?php endforeach; ?>
        <?php else: ?>


            <div class="form_item" id="ex_0">
                <?= $form->field($model, 'experience[0][employed_work_place]', ["labelOptions" => ["label" => "Employed work place"]])->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'experience[0][years_ex]', ["labelOptions" => ["label" => "Experience years"]])->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'experience[0][employed]', ["labelOptions" => ["label" => "Employed"]])->textInput(['maxlength' => true]) ?>
                <i class="fa fa-remove remove_fields"></i>
            </div>

        <?php endif; ?>
    </fieldset>
    <?= $form->field($model, 'skills')->textarea(['rows' => 6]) ?>

    <!--        --><? //= $form->field($model, 'lng_id')->hiddenInput(['value' => 1])->label(false); ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>

<!--</div>-->
