<?php
use common\models\Type;
use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */

/* @var $model common\models\Media */


$this->title = $model->name;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Media'), 'url' => ['index']];

$this->params['breadcrumbs'][] = $this->title;

?>

<div class="media-view">
    <p>

        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [

            'class' => 'btn btn-danger',

            'data' => [

                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),

                'method' => 'post',

            ],

        ]) ?>

    </p>


    <?php $t = Type::find()->where(['id' => $model->type_id])->asArray()->one(); ?>

    <?= DetailView::widget([

        'model' => $model,

        'attributes' => [

//            'id',
            'name',
            'type' =>
                ['attribute' => 'type',
                    'value' => $t['title']
                ]

        ],

    ]) ?>


</div>

