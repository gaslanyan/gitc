<?php



use yii\helpers\Html;

use yii\widgets\ActiveForm;



/* @var $this yii\web\View */

/* @var $model common\models\WorkPlace */

/* @var $form yii\widgets\ActiveForm */

?>



<div class="work-place-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="form_item" id="ex_0">
        <?= \backend\widgets\MediaWidget::widget(); ?>
        <div class="show">
            <?php
            //            var_dump($model->oldAttributes);
            if (isset($model->oldAttributes['name']) && $model->oldAttributes['name'] != ""): ?>
                <?= HTML::img($model->oldAttributes['name'], ['class' => 's_img']); ?>
                <i class="fa fa-remove delete_inserted"></i>
            <?php endif; ?>
        </div>
        <p><a id="media" class="btn btn-success media">Add media</a></p>
    </div>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sort_id')->textInput(['maxlength' => true]);?>

    <div class="form-group">

        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    </div>

    <?php ActiveForm::end(); ?>



</div>

