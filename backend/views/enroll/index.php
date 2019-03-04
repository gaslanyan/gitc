<?php

use yii\grid\GridView;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $searchModel common\models\search\EnrollSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Enrolls');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enroll-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Enroll'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'firstname',
        'lastname',
        'email',
        'city',
        'phone',
    ];
    ?>


    <?= \kartik\export\ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
//        'fontAwesome' => true,
        'dropdownOptions' => [
            'label' => 'Բեռնել',
            'class' => 'btn btn-default'
        ]
    ]) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'firstname',
            'lastname',
//            'state',
            'city',
            // 'dob',
            'phone',
            'email:email',
            // 'course_id',
            'subjects:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
