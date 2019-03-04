<?php
use yii\helpers\Html;

use yii\grid\GridView;

/* @var $this yii\web\View */

/* @var $searchModel common\models\ProjectsSearch */

/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Region');

$this->params['breadcrumbs'][] = $this->title;

?>

<div class="projects-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>

        <?= Html::a(Yii::t('app', 'Create Region'), ['create'], ['class' => 'btn btn-success']) ?>

    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'region',
            [
                'attribute' => 'country_id',
                'value' => 'country.country',
                'filter' => yii\helpers\ArrayHelper::map(common\models\Country::find()->where(['is_status' => 1])->all(), 'id', 'country')
            ],
            [
                'attribute' => 'is_status',
                'class' => '\pheme\grid\ToggleColumn',
                'enableAjax' => false,
                'filter' => ['1' => 'Active', '0' => 'Not Active'],
            ],
            ['class' => 'common\components\CustomActionColumn'],
        ],
    ]);; ?>



</div>

