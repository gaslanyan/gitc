<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */

/* @var $model common\models\Slider */

/* @var $form yii\widgets\ActiveForm */

?>


<div class="slider-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="form_item" id="ex_0">
        <?= \backend\widgets\MediaWidget::widget(); ?>
        <div class="show">

        </div>
        <p><a id="slider" class="btn btn-success media">Add media</a></p>
    </div>
    <div class="form-group">

        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    </div>

    <?php if (!empty($model->id)): ?>
        <?php
        if (!empty($model->name)): ?>
            <?php $name = json_decode($model->name); ?>
            <?php foreach ($name as $item): ?>
                <div class="view">
                    <img src="<?= Yii::$app->params['uploads'] . Yii::$app->params['media'] . $item; ?>">
                    <input type="hidden" name="name[]" value="<?= $item;?>">
                    <i class="fa fa-remove remove_fields"></i>

                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endif; ?>

    <?php ActiveForm::end(); ?>


</div>
