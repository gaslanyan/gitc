<?php


use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WorkPlace */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Work Place',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Work Places'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="work-place-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
