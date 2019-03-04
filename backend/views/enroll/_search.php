<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\EnrollSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="enroll-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'firstname') ?>

    <?= $form->field($model, 'lastname') ?>

    <?= $form->field($model, 'state') ?>

    <?= $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'dob') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'course_id') ?>

    <?php // echo $form->field($model, 'subjects') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
