<?php



use yii\helpers\Html;

use yii\grid\GridView;




/* @var $this yii\web\View */

/* @var $searchModel common\models\WorkPlaceSearch */

/* @var $dataProvider yii\data\ActiveDataProvider */



$this->title = Yii::t('app', 'Work Places');

$this->params['breadcrumbs'][] = $this->title;

?>

<div class="work-place-index">



    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>




    <p>

        <?= Html::a(Yii::t('app', 'Create Work Place'), ['create'], ['class' => 'btn btn-success']) ?>

    </p>



    <?= GridView::widget([

        'dataProvider' => $dataProvider,

        'filterModel' => $searchModel,
        'columns' => [

            ['class' => 'yii\grid\SerialColumn'],



            'id',
            'name',
            'link',
            'sort_id',



            ['class' => 'yii\grid\ActionColumn'],

        ],

    ]); ?>



</div>

