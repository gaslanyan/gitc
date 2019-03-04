<?php


use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel common\models\ResultSearch */

/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Results');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="result-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <p>
        <?= Html::a(Yii::t('app', 'Create Result'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'persent',
            'count',


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
