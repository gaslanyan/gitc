<?php



use yii\helpers\Html;

use yii\widgets\ActiveForm;



/* @var $this yii\web\View */

/* @var $model common\models\Projects */

/* @var $form yii\widgets\ActiveForm */

?>



<div class="projects-form">

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
            $l = 'en';
            foreach ($activeLanguages as $key => $lang):
                $i = $lang['code'];
                $l = $i;
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
            <?= \backend\widgets\MediaWidget::widget(); ?>
        </div>
    </div>



    <p><a id="training" class="btn btn-success media">Add media</a></p>

    <div class="show">
        <?php
//var_dump($model->oldAttributes['img_name']);
        if (!empty($model->oldAttributes['img_name'])): ?>
            <?= HTML::img($model->oldAttributes['img_name'], ['class' => 's_img']); ?>
            <input type="hidden" name="img_name" value="<?= $model->oldAttributes['img_name'];?>">
            <i class="fa fa-remove delete_inserted"></i>
        <?php endif; ?>
    </div>
    <?= $form->field($model, 'is_active')->dropDownList([ 'Disaled' => 'Disaled', 'Active' => 'Active', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'video')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sort_id')->textInput(['maxlength' => true]);?>

    <div class="form-group">

        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    </div>



    <?php ActiveForm::end(); ?>



</div>

