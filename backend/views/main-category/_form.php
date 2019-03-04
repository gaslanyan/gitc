<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\MainCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<?php

if($this->context->action->id == 'update'){
    $action = ['update', 'id' => $_REQUEST['id']];
}else{
    $action = ['create'];
}

?>
<div class="box view-item <?php echo $model->isNewRecord ? 'box-success' : 'box-info' ?>">
    <div class="box-body">
        <div class="main-category-form">
           
             <?php $form = ActiveForm::begin([
                 'id' => 'main-category-form',
                 'action' => $action,
                 'enableAjaxValidation' => true
             ]); ?>

            <?= $form->field($model, 'main_category', ['inputOptions' => ['placeholder' => 'Main Category Name', 'class' => 'form-control', 'autocomplete' => 'off']])->textInput(['maxlength' => true])->label(false) ?>

            <?= $form->field($model, 'icon', ['inputOptions' => ['placeholder' => 'Icon', 'class' => 'form-control', 'autocomplete' => 'off']])->textInput(['maxlength' => true])->label(false) ?>
            <div style="margin-top: -13px; margin-left: 2px">
                <p class="help-block"><i><a href="<?php echo \yii\helpers\Url::to(['icon-docs/']) ?>" target="_blank">Icon Documentation</a></i></p>
            </div>
            <?= $form->field($model, 'is_status')->dropDownList(['1' => 'Active', '0' => 'Not Active'],['prompt' => '-- Status --'])->label(false); ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                <?php 
                    if($model->isNewRecord){
                        echo Html::resetButton('Reset', ['class' => 'btn btn-default']);
                    }else{
                        echo Html::a('Cancel', ['main-category/index'], ['class' => 'btn btn-back']);
                    }
                ?>
            </div>

            <?php ActiveForm::end(); ?>
            
        </div>
    </div>
</div>
