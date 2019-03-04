<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = $pageContent['name'];

?>

<section class="gitc_wrapper">
    <div class="gitc_info-block">
        <div class="gitc_info">
            <h2 class="gitc_title"><?= Yii::t('app','GYUMRI INFORMATION TECHNOLOGIES CENTER');?></h2>
            <p>
                <?= Yii::t('app','GITC_INFO');?>
            </p>

        </div>
        <div class="gitc_worker">
            <div class="gitc_svg">
                <div class="gitc_chart">
                    <div class="chart" >

                        <svg width="293" height="293">
                            <circle class="outer" cx="88" cy="88" r="86" transform="rotate(-90, 150, 86)"></circle>
                        </svg>
                    </div>
                    <input type="hidden" value="99">
                </div>
                <div class="gitc_per">
                    <div class="gitc_per-worker"></div>
                    <span>99% <?= Yii::t('app','Worker');?></span>
                    <div class="gitc_per-unemployed"></div>
                    <span>1% <?= Yii::t('app','Unemployed');?></span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="gitc_results">
    <div class="gitc_wrapper">
        <div class="gitc_result">
            <span class="element__text"><?= Yii::t('app','Results');?></span>
        </div>
        <?= \frontend\widgets\ResultWidget::widget(); ?>
    </div>

</section>
<section class="gitc_wrapper home" id="gitc-enroll-form">

    <h3><?= Yii::t('app', 'Enroll in our courses') ?></h3>

    <article>
        <?php $form = ActiveForm::begin(); ?>
        <div class="gitc_inputs-first-block">
            <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'state')->dropDownList(
                \yii\helpers\ArrayHelper::map(\common\models\Region::find()->all(), 'id', Yii::t('app', 'region')),
                [
                    'prompt' => Yii::t('app', 'Select State'),
                    'onchange' => '
                            $.get("' . yii\helpers\Url::toRoute(['/dependent/getcity']) . '", { id: $(this).val() })
                                .done(function(data){
                                    $("#' . Html::getInputId($model, 'city') . '").html( data );
                                });'
                ]); ?>

            <label for="gitc_w1-kvdate"><?= Yii::t('app', 'Date of Birth') ?></label>

            <?= \kartik\date\DatePicker::widget([
                'name' => 'Enroll[dob]',
                'type' => \kartik\date\DatePicker::TYPE_COMPONENT_PREPEND,
                'value' => '1998-01-01',

                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]); ?>

            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        </div>

        <div class="gitc_inputs-second-block">

            <iframe  height="300" width="100%" class="gitc_about-gitc-video"
                     src="https://www.youtube.com/embed/S0c8yNp4EQo?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0" frameborder="0" allowfullscreen>
            </iframe>
            <div class="gitc_changing">
                <p><?= Yii::t('app','Signature');?></p>
            </div>

            <!-- Home Content End -->
            <?= $form->field($model, 'course_id')->dropDownList(
                $courses,
                [
                    'prompt' => Yii::t('app', 'To which course you want to enroll?')
                ]) ?>

            <div class="gitc_form-group ">
                <?= Html::submitButton(Yii::t('app', 'Enroll'),
                    ['class' => 'send_button']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>

    </article>
</section>



