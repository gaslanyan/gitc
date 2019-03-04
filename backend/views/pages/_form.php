<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Pages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pages-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php
    if (!$model->isNewRecord) {
        echo $form->field($model, 'slug')->textInput(['maxlength' => true]);
    }
    ?>

    <?= $form->field($model, 'active_in_menu')->dropDownList(['1' => 'Yes', '0' => 'No'],
        ['prompt' => '---Show this page in menu?---']); ?>

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

                    <?= $form->field($finalModel[$lang['code']],
                        "[$i]content")->widget(\dosamigos\ckeditor\CKEditor::className(), [
                        'options' => ['rows' => 6],
                        'preset' => 'full',
                        'clientOptions' => [
                            'filebrowserUploadUrl' => \yii\helpers\Url::to(['ckeditor/url']),
                            'allowedContent' => true
                        ]
                    ]) ?>
                    <?php if (isset($finalModel[$i]['s_name']) && count($finalModel[$i]['s_name']) > 0): ?>
                        <?php for ($j = 0; $j < count($finalModel[$i]['s_name']); ++$j): ?>

                            <fieldset>
                                <legend><?= Yii::t('app', 'Staff'); ?></legend>
                                <i class="fa fa-plus-square add_ed"></i>
                                <i class="fa fa-remove remove_fields"></i>
                                <div class="form_item" id="ex_<?= $j ?>">
                                    <?= $form->field($finalModel[$lang['code']], "[$i]s_name[$j]", ["labelOptions" => ["label" => "s-name"]])->textInput(); ?>
                                    <?= $form->field($finalModel[$lang['code']], "[$i]s_profession[$j]", ["labelOptions" => ["label" => 's-profession']])->textInput(); ?>
                                    <?= $form->field($finalModel[$lang['code']], "[$i]s_linkedin[$j]", ["labelOptions" => ["label" => 's-linkedin']])->textInput(); ?>
                                    <?= $form->field($finalModel[$lang['code']], "[$i]s_image[$j]", ["labelOptions" => ["label" => ""]])->hiddenInput(); ?>
                                    <div class="show">
                                        <?php if (isset($finalModel[$i]['s_image']) && $finalModel[$i]['s_image'] != ""): ?>
                                            <?= HTML::img($finalModel[$i]['s_image'][$j], ['class' => 's_img']); ?>
                                            <i class="fa fa-remove delete_inserted"></i>
                                        <?php endif; ?>
                                    </div>
                                    <p><a id="<?= "s_$i" . "_" . $j; ?>" class="btn btn-success media">Add media</a></p>

                                </div>
                            </fieldset>
                            <?php
                        endfor;
                    else: ?>
                        <fieldset>
                            <legend><?= Yii::t('app', 'Staff'); ?></legend>
                            <i class="fa fa-plus-square add_ed"></i>
                            <!--                            <i class="fa fa-remove remove_fields"></i>-->
                            <div class="form_item" id="ex_0">
                                <?= $form->field($finalModel[$lang['code']], "[$i]s_name[0]", ["labelOptions" => ["label" => "s-name"]])->textInput(); ?>
                                <?= $form->field($finalModel[$lang['code']], "[$i]s_profession[0]", ["labelOptions" => ["label" => 's-profession']])->textInput(); ?>
                                <?= $form->field($finalModel[$lang['code']], "[$i]s_linkedin[0]", ["labelOptions" => ["label" => 's-linkedin']])->textInput(); ?>
                                <?= $form->field($finalModel[$lang['code']], "[$i]s_image[0]", ["labelOptions" => ["label" => ""]])->hiddenInput(); ?>
                                <div class="show">
                                    <?php if (isset($finalModel[$i]['s_image']) && $finalModel[$i]['s_image'] != ""): ?>
                                        <?= HTML::img($finalModel[$i]['s_image'][0], ['class' => 's_img']); ?>
                                        <i class="fa fa-remove delete_inserted"></i>
                                    <?php endif; ?>
                                </div>
                                <p><a id="<?= "s_" . $i . "_0"; ?>" class="btn btn-success media">Add media</a></p>
                            </div>
                        </fieldset>
                        <?php
                    endif;
                    ?>

                    <?php if (isset($finalModel[$i]['l_name']) && count($finalModel[$i]['l_name']) > 0): ?>
<!--                        --><?php //var_dump(count($finalModel[$i]['l_name'])) ?>
                        <?php for ($j = 0; $j <= count($finalModel[$i]['l_name']); ++$j): ?>
                            <fieldset>
                                <legend><?= Yii::t('app', 'Lectchure'); ?></legend>
                                <i class="fa fa-plus-square add_ed"></i>
                                <i class="fa fa-remove remove_fields"></i>
                                <div class="form_item" id="ex_<?= $j ?>">
                                    <?= $form->field($finalModel[$lang['code']], "[$i]l_name[$j]", ["labelOptions" => ["label" => 'l-name']])->textInput(); ?>
                                    <?= $form->field($finalModel[$lang['code']], "[$i]l_profession[$j]", ["labelOptions" => ["label" => 'l-profession']])->textInput(); ?>
                                    <?= $form->field($finalModel[$lang['code']], "[$i]l_linkedin[$j]", ["labelOptions" => ["label" => 'l-linkedin']])->textInput(); ?>
                                    <?= $form->field($finalModel[$lang['code']], "[$i]l_image[$j]", ["labelOptions" => ["label" => ""]])->hiddenInput(); ?>
                                    <div class="show">
                                        <?php if (isset($finalModel[$i]['l_image']) && $finalModel[$i]['l_image'] != ""): ?>
                                            <?= HTML::img($finalModel[$i]['l_image'][$j], ['class' => 'l_img']); ?>
                                            <i class="fa fa-remove delete_inserted"></i>
                                        <?php endif; ?>
                                    </div>
                                    <p><a id="<?= "l_$i" . "_" . $j; ?>" class="btn btn-success media">Add media</a></p>
                                </div>
                            </fieldset>
                            <?php
                        endfor;
                    else: ?>

                        <fieldset>
                            <legend><?= Yii::t('app', 'Lecture'); ?></legend>
                            <i class="fa fa-plus-square add_ed"></i>
                            <i class="fa fa-remove remove_fields"></i>
                            <div class="form_item" id="ex_0">

                                <?= $form->field($finalModel[$lang['code']], "[$i]l_name[0]", ["labelOptions" => ["label" => "l-name"]])->textInput(); ?>
                                <?= $form->field($finalModel[$lang['code']], "[$i]l_profession[0]", ["labelOptions" => ["label" => 'l-profession']])->textInput(); ?>
                                <?= $form->field($finalModel[$lang['code']], "[$i]l_linkedin[0]", ["labelOptions" => ["label" => 'l-linkedin']])->textInput(); ?>
                                <?= $form->field($finalModel[$lang['code']], "[$i]l_image[0]", ["labelOptions" => ["label" => ""]])->hiddenInput(); ?>
                                <div class="show">
                                    <?php if (isset($finalModel[$i]['l_image']) && $finalModel[$i]['l_image'] != ""): ?>
                                        <?= HTML::img($finalModel[$i]['l_image'][0], ['class' => 'l_img']); ?>
                                        <i class="fa fa-remove delete_inserted"></i>
                                    <?php endif; ?>
                                </div>
                                <p><a id="<?= "l_" . $i . "_0"; ?>" class="btn btn-success media">Add media</a></p>
                            </div>
                        </fieldset>
                        <?php
                    endif;
                    ?>

                </div>

                <?php
            endforeach;
            ?>
        </div>
    </div>
    <hr>
</div>
<?= \backend\widgets\MediaWidget::widget(); ?>
<div>
    <?= $form->field($model, 'is_active')->dropDownList(['1' => 'Active', '0' => 'Disabled'],
        ['prompt' => '---Select Status---']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
