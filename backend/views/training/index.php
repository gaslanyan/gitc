<?php



use yii\helpers\Html;

use yii\grid\GridView;




/* @var $this yii\web\View */

/* @var $searchModel backend\models\TrainingSearc */

/* @var $dataProvider yii\data\ActiveDataProvider */



$this->title = Yii::t('app', 'Trainings');

$this->params['breadcrumbs'][] = $this->title;

?>




    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>




    <p>

        <?= Html::a(Yii::t('app', 'Create Training'), ['create'], ['class' => 'btn btn-success']) ?>

    </p>



    <?= GridView::widget([

        'dataProvider' => $dataProvider,

        'filterModel' => $searchModel,
        'columns' => [

            ['class' => 'yii\grid\SerialColumn'],



//            'id',
            'title',
            'img_name',
            'status',
//            'content:ntext',
            // 'created_at',
            // 'updated_at',
            'sort_id',


            ['class' => 'yii\grid\ActionColumn'],

        ],

    ]); ?>



</div>

