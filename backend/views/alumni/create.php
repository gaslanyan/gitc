<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Alumni */

$this->title = Yii::t('app', 'Create Alumni');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Alumnis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alumni-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
