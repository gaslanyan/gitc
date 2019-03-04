<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use kartik\sortinput\SortableInputAsset;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

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

                    <?= $form->field($finalModel[$lang['code']], "[$i]name")->textInput() ?>

                    <?= $form->field($finalModel[$lang['code']], "[$i]keywords")->textInput() ?>

                    <?= $form->field($finalModel[$lang['code']], "[$i]description")->textInput() ?>

                    <?= $form->field($finalModel[$lang['code']], "[$i]content")->widget(\dosamigos\ckeditor\CKEditor::className(), [
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
            ?>
        </div>
    </div>

    <hr>


    <?= $form->field($model, 'is_active')->dropDownList(['1' => 'Active', '0' => 'Disabled'], ['prompt' => '---Select Status---']) ?>

    <?= $form->field($model, 'sort_id')->textInput();?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
