<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\AlumniSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alumni-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

<!--    --><?//= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'surname') ?>

    <?= $form->field($model, 'fname') ?>

    <?= $form->field($model, 'profession') ?>

<!--    --><?//= $form->field($model, 'passport') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'e_mail') ?>

    <?php // echo $form->field($model, 'languages') ?>

    <?php // echo $form->field($model, 'occupation') ?>

    <?php // echo $form->field($model, 'family_condition') ?>

    <?php // echo $form->field($model, 'profile') ?>

<!--    --><?php // echo $form->field($model, 'technical_languages') ?>

    <?php // echo $form->field($model, 'education') ?>

    <?php // echo $form->field($model, 'experience') ?>

    <?php // echo $form->field($model, 'skills') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
