<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Region */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="region-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'region')->textInput(['maxlength' => true]) ?>
    <div class="container"><h1>Content in available languages</h1></div>
    <div id="exTab1">
        <ul class="nav nav-pills">
            <?php

            foreach ($activeLanguages as $key => $lang):
                ?>
                <li class="<?= ($key == 0) ? 'active' : ''; ?>">
                    <a href="#<?= $lang['id'] ?>" data-toggle="tab"><?= $lang['name'] ?></a>
                </li>
            <?php
            endforeach;
            ?>
        </ul>

        <div class="tab-content clearfix">

            <?php
            foreach ($activeLanguages as $key => $lang):
                $i = $lang['code'];
                ?>

                <div class="tab-pane <?= ($key == 0) ? 'active' : ''; ?>" id="<?= $lang['id'] ?>">

                    <?= $form->field($finalModel[$lang['code']], "[$i]title")->textInput() ?>

                    <?= $form->field($finalModel[$lang['code']], "[$i]description")->widget(\dosamigos\ckeditor\CKEditor::className(), [
                        'options' => ['rows' => 6],
                        'preset' => 'full',
                        'clientOptions' => [
                            'filebrowserUploadUrl' => \yii\helpers\Url::to(['ckeditor/url']),
                            'allowedContent' => true
                        ]
                    ]) ?>

                </div>

            <?php
            endforeach;
//            ?>
        </div>
    </div>

    <div class="form_item" id="ex_0">
        <?= \backend\widgets\MediaWidget::widget(); ?>
        <div class="show">
            <?php
            //var_dump($model->oldAttributes['img_name']);
            if (!empty($model->oldAttributes['img_name'])): ?>
                <?= HTML::img($model->oldAttributes['img_name'], ['class' => 's_img']); ?>
                <input type="hidden" name="img_name" value="<?= $model->oldAttributes['img_name'];?>">
                <i class="fimagea fa-remove delete_inserted"></i>
            <?php endif; ?>
        </div>
        <p><a id="training" class="btn btn-success media">Add media</a></p>
    </div>

    <?= $form->field($model, 'sort')->textInput(['maxlength' => true]);?>
    <?php $listDataCountry = yii\helpers\ArrayHelper::map(common\models\Country::find()->where(['is_status' => 1])->all(), 'id', 'country') ?>
    <?= $form->field($model, 'country_id')->dropDownList($listDataCountry, ['prompt' => '-- Select Country'])->label(false); ?>
    <?= $form->field($model, 'region', ['inputOptions' => ['placeholder' => 'Region Name', 'class' => 'form-control']])->textInput(['maxlength' => true])->label(false) ?>
    <?= $form->field($model, 'is_status')->dropDownList(['1' => 'Active', '0' => 'Not Active'], ['prompt' => '-- Status --'])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

