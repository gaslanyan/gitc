<?php


use yii\helpers\Html;
use yii\redactor\widgets\Redactor;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */

/* @var $model common\models\Training */

/* @var $form yii\widgets\ActiveForm */

?>


<div class="training-form">


    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(['popular' => 'Popular', 'other' => 'Other',], ['prompt' => '---Select Status---']) ?>

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

                    <?= $form->field($finalModel[$lang['code']], "[$i]start")->textInput() ?>

                    <?= $form->field($finalModel[$lang['code']], "[$i]day")->textInput() ?>

                    <?= $form->field($finalModel[$lang['code']], "[$i]duration")->textInput() ?>

                    <?= $form->field($finalModel[$lang['code']], "[$i]hours")->textInput() ?>

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

 <div class="form_item" id="ex_0">
        <?= \backend\widgets\MediaWidget::widget(); ?>
        <div class="show">

        </div>
        <p><a id="training" class="btn btn-success media">Add media</a></p>
    </div>
    <div class="show">
        <?php
        //            var_dump($model->oldAttributes);
        if (isset($model->oldAttributes['img_name']) && $model->oldAttributes['img_name'] != ""): ?>
            <?= HTML::img($model->oldAttributes['img_name'], ['class' => 's_img']); ?>
            <input type="hidden" name="img_name" value="<?= $model->oldAttributes['img_name'];?>">
            <i class="fa fa-remove delete_inserted"></i>
        <?php endif; ?>
    </div>


    <a href="<?= \yii\helpers\Url::home() . 'icon-docs'; ?>" target="_blank">Select icon name</a>

    <?= $form->field($model, 'sort_id')->textInput(['maxlength' => true]);?>

    <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_active')->dropDownList(['1' => 'Active', '0' => 'Disabled'], ['prompt' => '---Select Status---']) ?>


    <div class="form-group">

        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    </div>


    <?php ActiveForm::end(); ?>


</div>

