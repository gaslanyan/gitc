<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\AlumniSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Alumnis');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alumni-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Alumni'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'surname',
            'fname',
            'profession',
//            'birthday',
            // 'address',
            // 'phone',
            // 'e_mail',
            // 'languages',
            // 'occupation',
            // 'family_condition',
            // 'profile',
//             'technical_languages',
            // 'education:ntext',
            // 'experience:ntext',
            // 'skills:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
