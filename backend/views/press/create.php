<?php



use yii\helpers\Html;





/* @var $this yii\web\View */

/* @var $model common\models\Press */



$this->title = Yii::t('app', 'Create Press');

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Presses'), 'url' => ['index']];

$this->params['breadcrumbs'][] = $this->title;

?>

<div class="press-create">



    <h1><?= Html::encode($this->title) ?></h1>



    <?= $this->render('_form', [

        'model' => $model,
        'activeLanguages' => $activeLanguages,
        'finalModel' => $finalModel

    ]) ?>



</div>

