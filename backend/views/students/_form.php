<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */

/* @var $model common\models\Students */

/* @var $form yii\widgets\ActiveForm */

?>

<div class="students-form">
    <?php $form = ActiveForm::begin(); ?>


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

                    <?= $form->field($finalModel[$lang['code']], "[$i]status")->textInput() ?>

                    <?= $form->field($finalModel[$lang['code']], "[$i]content")->widget(\yii\redactor\widgets\Redactor::className()) ?>


                </div>

                <?php
            endforeach;
            ?>
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
    </div>

    <div class="form_item" id="ex_0">
        <?= \backend\widgets\MediaWidget::widget(); ?>
        <div class="show">

        </div>
        <p><a id="training" class="btn btn-success media">Add media</a></p>
    </div>
<?php //var_export($model);?>
    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>


    <div class="form-group">

        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    </div>


    <?php ActiveForm::end(); ?>


</div>

