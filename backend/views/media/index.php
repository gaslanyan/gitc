<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\MediaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Media');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="media-index">

    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Media'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::img( Yii::$app->params['MEDIA_IMG_PATH'] . $model->name, ['class'  => 'list_img']), ['view', 'id' => $model->id]);

        },
    ]) ?>
    <?php Pjax::end(); ?>
</div>
