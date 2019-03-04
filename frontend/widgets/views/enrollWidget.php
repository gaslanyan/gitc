<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/5/2016
 * Time: 9:29 PM
 */
use backend\assets\AppAsset;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

AppAsset::register($this);

?>
<section class="gitc_wrapper" id="gitc-enroll-form">

    <h3><?= Yii::t('app', 'Enroll in our courses') ?></h3>

    <article>
        <?php $form = ActiveForm::begin(); ?>
        <div class="gitc_inputs-first-block">
            <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>


            <label for="gitc_w1-kvdate"><?= Yii::t('app', 'Date of Birth') ?></label>

            <?= \kartik\date\DatePicker::widget([
                'name' => 'Enroll[dob]',
                'type' => \kartik\date\DatePicker::TYPE_COMPONENT_PREPEND,
                'value' => '1998-01-01',

                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]); ?>

        </div>

        <div class="gitc_inputs-second-block">

            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <!-- Home Content End -->
            <?= $form->field($model, 'subjects')->dropDownList(
                $courses,
                [
                    'prompt' => Yii::t('app', 'To which course you want to enroll?'),

                ]); ?>

            <div class="gitc_form-group ">
                <?= Html::submitButton(Yii::t('app', 'Enroll'),
                    ['class' => 'send_button']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>

    </article>
</section>
