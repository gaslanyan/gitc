<?php



use yii\helpers\Html;



/* @var $this yii\web\View */

/* @var $model common\models\Training */



$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Training',
]) . $model->title;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Trainings'), 'url' => ['index']];

$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];

$this->params['breadcrumbs'][] = Yii::t('app', 'Update');

?>

<div class="training-update">



    <h1><?= Html::encode($this->title) ?></h1>



    <?= $this->render('_form', [

        'model' => $model,
        'activeLanguages' => $activeLanguages,
        'finalModel' => $finalModel
    ]) ?>



</div>

