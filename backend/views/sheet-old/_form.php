<?php

use common\models\Country;
use common\models\District;
use common\models\Region;
use common\models\Status;
use common\models\Relationship;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SheetOld */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sheet-form">
    <div class="contents">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
        <section class=" col-lg-12 tops">
            <h4 class="col-lg-12">Երեխայի տվյալները</h4>

            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6" style="height: 100px">
                <?php if (!empty($model->image)): ?>
                    <?= Html::img("@web/images/$model->image", ['alt' => 'Երեխայի նկարը']) ?>
                <?php else: ?>
                    <?php if ($model->gender === "ԱՐԱԿԱՆ"): ?>
                        <?php $avatar = "boy.png" ?>
                    <?php else: ?>
                        <?php $avatar = "girl.png" ?>
                    <?php endif; ?>
                    <?= Html::img("@web/$avatar", ['alt' => 'Երեխայի նկարը']) ?>
                <?php endif; ?>
                <?= $form->field($model, 'image')->fileInput(['class' => 'btn btn-default'])->label(''); ?>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                <?= $form->field($model, 'prev_ids')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">

                <?= $form->field($model, 'gender')->dropDownList(['ԱՐԱԿԱՆ' => 'ԱՐԱԿԱՆ', 'ԻԳԱԿԱՆ' => 'ԻԳԱԿԱՆ',], ['prompt' => '']) ?>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                <?= $form->field($model, 'nation')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                <?= $form->field($model, 'birth_date')->widget(DatePicker::className(), [
                    'name' => 'out_home_date',
                    'options' => ['placeholder' => 'Select issue date ...'],
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true
                    ]
                ]) ?>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">

                <?= $form->field($model, 'passport_ser')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">

                <?= $form->field($model, 'passport_number')->textInput() ?>
            </div>
            <h4 class="col-lg-12">Երեխայի ծննդավայրը, երկիրը, քաղաքը/գյուղը</h4>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 text-center">
                <?= $form->field($model, 'birthplace')->dropDownList(ArrayHelper::map(Country::find()->orderBy(['name'=>SORT_ASC])->all(), 'id', 'name'),['prompt' => 'Ընտրել․․․'])->label('Երեխայի ծնդավայրը,երկիրը') ?>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                <?= $form->field($model, 'city_village')->dropDownList(ArrayHelper::map(District::find()->orderBy(['name'=>SORT_ASC])->all(), 'id', 'name'),['prompt' => 'Ընտրել․․․'])->label('Քաղաք, գյուղ') ?>
            </div>
            <h4 class="col-lg-12">Երեխայի ընթացիկ հասցեն</h4>

            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                <?= $form->field($model, 'region_id')->dropDownList(ArrayHelper::map(Region::find()->orderBy(['name'=>SORT_ASC])->all(), 'id', 'name'),['prompt' => 'Ընտրել․․․'])->label('Մարզ') ?>
            </div>

            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                <?= $form->field($model, 'region')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                <?= $form->field($model, 'phone')->textInput() ?>
            </div>

        </section>
        <section class="col-lg-12 child-current-info">
            <h4 class="col-lg-12">Տվյալներ խնամակալների մասին</h4>

            <fieldset class="col-lg-12">
                <?php $action = $this->context->action->id; ?>
                <?php if ($action === "update"): ?>
                    <?php foreach ($finalModel as $index => $item): ?>

                    <?php if($index  === 1):?>
                           <h5>Խնամակալ 1 </h5>
                        <?php else:?>
                            <h5>Խնամակալ 2 </h5>
                    <?php endif;?>
                        <div class="form_item col-lg-12">

                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                <?= $form->field($finalModel[$index], "[gurdian][$index]name", ["labelOptions" => ["label" => "Անուն"]])->textInput(); ?>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                <?= $form->field($finalModel[$index], "[gurdian][$index]surname", ["labelOptions" => ["label" => 'Ազգանուն']])->textInput(); ?>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                <?= $form->field($finalModel[$index], "[gurdian][$index]fname", ["labelOptions" => ["label" => 'Հայրանուն']])->textInput(); ?>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                <?= $form->field($finalModel[$index], "[gurdian][$index]relationship", ["labelOptions" => ["label" => "Ազգակցական կապ"]])->dropDownList(ArrayHelper::map(Relationship::find()->all(), 'id', 'name'),['prompt' => 'Ընտրել․․․']); ?>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                <?= $form->field($finalModel[$index], "[gurdian][$index]password", ["labelOptions" => ["label" => "Անձնագրային տվյալներ"]])->textInput(); ?> </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                <?= $form->field($finalModel[$index], "[gurdian][$index]status", ["labelOptions" => ["label" => "Կարգավիճակ"]])->dropDownList(ArrayHelper::map(Status::find()->all(), 'id', 'name'),['prompt' => 'Ընտրել․․․']); ?>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                <?= $form->field($finalModel[$index], "[gurdian][$index]country", ["labelOptions" => ["label" => "Երկիր"]])->textInput(); ?>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                <?= $form->field($finalModel[$index], "[gurdian][$index]region", ["labelOptions" => ["label" => "Մարզ"]])->textInput(); ?> </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                <?= $form->field($finalModel[$index], "[gurdian][$index]city", ["labelOptions" => ["label" => "Քաղաք"]])->textInput(); ?> </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                <?= $form->field($finalModel[$index], "[gurdian][$index]street", ["labelOptions" => ["label" => "Փողոց"]])->textInput(); ?> </div>
                            <div class="col-lg-1 col-md-1 col-sm-4 col-xs-6">
                                <?= $form->field($finalModel[$index], "[gurdian][$index]home", ["labelOptions" => ["label" => "Տուն"]])->textInput(); ?> </div>
                            <div class="col-lg-1 col-md-1 col-sm-4 col-xs-6">
                                <?= $form->field($finalModel[$index], "[gurdian][$index]apartment", ["labelOptions" => ["label" => "Բնակարան"]])->textInput(); ?> </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                <?= $form->field($finalModel[$index], "[gurdian][$index]phone", ["labelOptions" => ["label" => "Հեռախոս"]])->textInput(); ?> </div>

                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <?php for ($index = 1; $index <= 2; $index++): ?>
                        <div class="form_item col-lg-12">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                <?= $form->field($finalModel, "[gurdian][$index]name", ["labelOptions" => ["label" => "Անուն"]])->textInput(); ?>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                <?= $form->field($finalModel, "[gurdian][$index]surname", ["labelOptions" => ["label" => 'Ազգանուն']])->textInput(); ?>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                <?= $form->field($finalModel, "[gurdian][$index]fname", ["labelOptions" => ["label" => 'Հայրանուն']])->textInput(); ?>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                <?= $form->field($finalModel, "[gurdian][$index]password", ["labelOptions" => ["label" => "Անձնագրային տվյալներ"]])->textInput(); ?>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                <?= $form->field($finalModel, "[gurdian][$index]status", ["labelOptions" => ["label" => "Կարգավիճակ"]])->dropDownList(ArrayHelper::map(Status::find()->all(), 'id', 'name'),['prompt' => 'Ընտրել․․․']); ?>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                <?= $form->field($finalModel, "[gurdian][$index]relationship", ["labelOptions" => ["label" => "Ազգակցական կապ"]])->dropDownList(ArrayHelper::map(Relationship::find()->all(), 'id', 'name'),['prompt' => 'Ընտրել․․․']); ?>; ?>; ?>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                <?= $form->field($finalModel, "[gurdian][$index]country", ["labelOptions" => ["label" => "Երկիր"]])->textInput(); ?>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                <?= $form->field($finalModel, "[gurdian][$index]region", ["labelOptions" => ["label" => "Մարզ"]])->textInput(); ?>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                <?= $form->field($finalModel, "[gurdian][$index]city", ["labelOptions" => ["label" => "Քաղաք"]])->textInput(); ?>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                <?= $form->field($finalModel, "[gurdian][$index]street", ["labelOptions" => ["label" => "Փողոց"]])->textInput(); ?>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-4 col-xs-6">
                                <?= $form->field($finalModel, "[gurdian][$index]home", ["labelOptions" => ["label" => "Տուն"]])->textInput(); ?>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-4 col-xs-6">
                                <?= $form->field($finalModel, "[gurdian][$index]apartment", ["labelOptions" => ["label" => "Բնակարան"]])->textInput(); ?>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                <?= $form->field($finalModel, "[gurdian][$index]phone", ["labelOptions" => ["label" => "Հեռախոս"]])->textInput(); ?>
                            </div>

                        </div>
                    <?php endfor; ?>


                <?php endif; ?>
            </fieldset>
        </section>
        <section class="col-lg-12 child-current-info">
            <h4 class="col-lg-12">Երեխայի տվյալները</h4>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <?= $form->field($model, 'reason_delay_text')->textarea(['rows' => 6]) ?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <?= $form->field($model, 'out_home_date')->widget(DatePicker::className(), [
                    'name' => 'out_home_date',
                    'options' => ['placeholder' => 'Select issue date ...'],
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true
                    ]
                ]) ?>
            </div>
<!--            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">-->
<!--                --><?//= $form->field($model, 'bervq')->textInput() ?>
<!--            </div>-->
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <?= $form->field($model, 'ngbh')->dropDownList(['Այո' => 'Այո', 'Ոչ' => 'Ոչ', 'Տեղեկություն չկա' => 'Տեղեկություն չկա'], ['prompt' => 'Ընտրել․․․']) ?>
            </div>
        </section>

        <section class="col-lg-12 child-current-info">
            <h4 class="col-lg-12">Տվյալներ դպրոցից</h4>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                <?= $form->field($model, 'accounting_department')->textInput() ?>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                <?= $form->field($model, 'dprkax')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                <?= $form->field($model, 'school_phone')->textInput() ?>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                <?= $form->field($model, 'not_attend_mount')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                <?= $form->field($model, 'not_attend_year')->textInput() ?>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                <?= $form->field($model, 'out_education')->dropDownList(['Այո' => 'Այո', 'Ոչ' => 'Ոչ', ], ['prompt' => 'Ընտրել․․․']) ?>
            </div>
        </section>
        <section class="col-lg-12 child-current-info">
            <h4 class="col-lg-12">Տվյալներ Կենտրոնից դուրս գրվելու մասին</h4>

            <div class="col-lg-offset-1 col-lg-5 col-md-6 col-sm-6 col-xs-12">
                <?= $form->field($model, 'absenteeism_date')->widget(DatePicker::className(), [
                    'name' => 'out_home_date',
                    'options' => ['placeholder' => 'Select issue date ...'],
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true
                    ]
                ]) ?>
            </div>

            <div class="col-lg-offset-1 col-lg-5 col-md-6 col-sm-6 col-xs-12">
                <?= $form->field($model, 'out_date')->widget(DatePicker::className(), [
                    'name' => 'out_date',
                    'options' => ['placeholder' => 'Select issue date ...'],
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true
                    ]
                ]) ?>
            </div>


            <fieldset class="col-lg-12">
                <?php $out = Yii::$app->params['out'];
                $step = 0; ?>
                <div class="form_item col-lg-12">
                    <!--                    --><?php // echo "<pre>"; var_dump($outModel);die;?>
                    <?php foreach ($outModel as $index => $item): ?>

                        <div class="col-lg-3">
                            <?= $form->field($outModel, "[out_set_date]$index", ["labelOptions" => ["label" => $out[$step]]])->widget(DatePicker::className(), [
                                'name' => 'out_set_date',
                                'options' => ['placeholder' => 'Select issue date ...'],
                                'pluginOptions' => [
                                    'format' => 'yyyy-mm-dd',
                                    'todayHighlight' => true
                                ]
                            ]); ?>
                        </div>
                        <?php $step++; endforeach; ?>
                </div>
            </fieldset>
            <?php ?>
        </section>
        <section class="col-lg-12">
            <h4 class="col-lg-12">Տվյալներ երեխայի ընդունման վերաբերյալ</h4>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                <?= $form->field($model, 'off_surname')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                <?= $form->field($model, 'off_name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                <?= $form->field($model, 'off_facility_name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                <?= $form->field($model, 'off_job')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                <?= $form->field($model, 'quality_clothes')->dropDownList(['ՄիՋԻՆ' => 'ՄիՋԻՆ', 'ՎԱՏ' => 'ՎԱՏ', 'ԲԱՎԱՐԱՐ' => 'ԲԱՎԱՐԱՐ',], ['prompt' => 'Ընտրել․․․']) ?>
            </div>
        </section>

        <section class="col-lg-12 child-current-info">
            <h4 class="col-lg-12">Տվյալներ ուղղորդող կառույցի մասին</h4>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                <?= $form->field($model, 'ughhanv')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                <?= $form->field($model, 'send_region')->dropDownList(ArrayHelper::map(Region::find()->orderBy(['name'=>SORT_ASC])->all(), 'id', 'name'),['prompt' => 'Ընտրել․․․'])->label('Մարզ') ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                <?= $form->field($model, 'send_city')->dropDownList(ArrayHelper::map(District::find()->orderBy(['name'=>SORT_ASC])->all(), 'id', 'name'),['prompt' => 'Ընտրել․․․'])->label('Քաղաք, գյուղ') ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                <?= $form->field($model, 'send_street')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                <?= $form->field($model, 'send_phone')->textInput() ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                <?= $form->field($model, 'hard_working_start')->widget(DatePicker::className(), [
                    'name' => 'out_home_date',
                    'options' => ['placeholder' => 'Select issue date ...'],
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true
                    ]
                ]) ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                <?= $form->field($model, 'hard_working_end')->widget(DatePicker::className(), [
                    'name' => 'out_home_date',
                    'options' => ['placeholder' => 'Select issue date ...'],
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true
                    ]
                ]) ?>
            </div>

        </section>
        <section class="col-lg-12 child-current-info">
            <h4 class="col-lg-12">Փորձագիտական խմբի եզրակացությունը </h4>
            <!--                <h4> Ուղեկցման փաստաթղթեր</h4>-->


            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <?= $form->field($file, 'yntbt')->fileInput(['class' => 'btn btn-default'])->label('Բժիշկ'); ?>
                <?= Html::a($model->yntbt, ['upload/yntbt_old/'.$model->yntbt], ['class' => 'profile-link', 'target' => 'blank']) ?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <?= $form->field($file, 'yntht')->fileInput(['class' => 'btn btn-default'])->label('Հոգեբան'); ?>
                <?= Html::a($model->yntht, ['upload/yntht_old/'.$model->yntht], ['class' => 'profile-link', 'target' => 'blank']) ?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <?= $form->field($file, 'yntmt')->fileInput(['class' => 'btn btn-default'])->label('Մանկավարժ'); ?>
                <?= Html::a($model->yntmt, ['upload/yntmt_old/'.$model->yntmt], ['class' => 'profile-link', 'target' => 'blank']) ?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <?= $form->field($model, 'yntsat')->fileInput(['class' => 'btn btn-default'])->label('Սոցիալական աշխատող'); ?>
                <?= Html::a($model->yntsat, ['upload/yntsat_old/'. $model->yntsat], ['class' => 'profile-link', 'target' => 'blank']) ?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <?= $form->field($file, 'ynthht')->fileInput(['class' => 'btn btn-default'])->label('Դաստիրակ'); ?>
                <?= Html::a($model->ynthht, ['upload/ynthht_old/'.$model->ynthht], ['class' => 'profile-link', 'target' => 'blank']) ?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <?= $form->field($file, 'bazmkh')->fileInput(['class' => 'btn btn-default'])->label('Բազմամասնագիտական թիմի եզրակացությունը'); ?>
                <?= Html::a($model->bazmkh, ['upload/bazmkh_old/'.$model->bazmkh], ['class' => 'profile-link', 'target' => 'blank']) ?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <?= $form->field($file, 'ngb')->fileInput(['class' => 'btn btn-default'])->label('Այլ փաստաթղթեր'); ?>
                <?= Html::a($model->ngb, ['upload/ngb_old/'.$model->ngb], ['class' => 'profile-link', 'target' => 'blank']) ?>
            </div>

        </section>
        <div class="form-group coll-lg-12">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>



