<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Subjects */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subjects-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_hy')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'course_id')->dropDownList(
        $courses=\yii\helpers\ArrayHelper::map(\common\models\Courses::find()->all(),'id','name'),
        ['prompt' => 'Select Course']); ?>

    <?= $form->field($model, 'is_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
