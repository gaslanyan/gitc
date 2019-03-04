<?php


use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WorkPlace */

$this->title = Yii::t('app', 'Create Work Place');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Work Places'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-place-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
