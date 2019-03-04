<?php


use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use common\models\Type;


/* @var $this yii\web\View */

/* @var $model common\models\Media */

/* @var $form yii\widgets\ActiveForm */

?>
<div class="media-form">
    <?php
    $controller = "/media/";
    $url = \yii\helpers\Url::current();
    $hidden = 'gitc';
    //    echo yii\helpers\Url::to([$controller]);
    if (strpos($url, 'update') > 0) {
        $controller .= 'update/' . $model->id;
        $hidden = $model->name;
    }
    if (strpos($url, 'create') > 0)
        $controller .= 'create';

    ?>
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->hiddenInput(['value' => $hidden])->label(false); ?>

    <?= $form->field($model, 'files')->widget(\kartik\file\FileInput::classname(), [
        'options' => [
            'multiple' => true
        ],
        'pluginOptions' => [
            'uploadUrl' => \yii\helpers\Url::to([$controller]),

            'allowedFileExtensions' => ['jpg', 'jpeg', 'png'],
            'showUpload' => true,
            'initialPreview' => [
//                                    $model-> img ? Html::img($model-> img) : null, // checks the models to display the preview
            ],
            'overwriteInitial' => false,
        ],
    ]);
    ?>

    <?php ActiveForm::end(); ?>

</div>

