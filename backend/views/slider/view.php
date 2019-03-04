<?php


use yii\helpers\Html;


/* @var $this yii\web\View */

/* @var $model common\models\Slider */


//$this->title = $model->name;

$this->params['breadcrumbs'][] =
    ['label' => Yii::t('app', 'Sliders'),
        'url' => ['index']];

$this->params['breadcrumbs'][] = $this->title;

?>

<div class="slider-view">


    <h1><?= Html::encode($this->title) ?></h1>


    <p>

        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [

            'class' => 'btn btn-danger',

            'data' => [

                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),

                'method' => 'post',

            ],

        ]) ?>

    </p>

    <div>
        <?php
        if (!empty($model->name)): ?>
            <?php $name = json_decode($model->name); ?>
            <?php foreach ($name as $item): ?>
                <div class="view">
                    <img src="<?= Yii::$app->params['uploads'] . Yii::$app->params['media'] . $item; ?>?>">
<!--                    <input type="hidden" name="name[]" value="--><?//= $item;?><!--">-->
<!--                    <i class="fa fa-remove remove_fields"></i>-->
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>


</div>

