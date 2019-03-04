<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Enroll | GITC'
?>
<section class="gitc_wrapper">
    <div class="menu_header">
        <div class="gitc_container">
            <h2>Enroll in our courses </h2>
        </div>
    </div>
    <article class="gitc_container  ">

        <div class="col-md-6">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

            <?= 'Date of Birth' ?>

            <?= \kartik\date\DatePicker::widget([
                'name' => 'Enroll[dob]',
                'type' => \kartik\date\DatePicker::TYPE_INPUT,
                'value' => '01-Feb-1998',
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'dd-M-yyyy'
                ]
            ]); ?>

            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'subject')->dropDownList(
                $courses,
                ['prompt' => 'To which course you want to enroll?']); ?>

            <div class="form-group">
                <?= Html::submitButton('Entoll',
                    ['class' => 'send_button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

    </article>
</section>