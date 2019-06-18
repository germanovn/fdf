<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\widgets\TournamentWidget;

/* @var $this yii\web\View */
/* @var $model app\models\Tournament */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tournaments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tournament-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'slug',
            [
                'attribute' => 'nominations',
                'value' => $model->nominationsNamesList,

            ],
        ],
    ]) ?>

    <p>
        <?= Html::a(Yii::t('app', 'Add Nomination'), ['nomination-tournament/create', 'tournament_id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= TournamentWidget::widget([
        'model' => $model,
        'caption' => sprintf( '<h2>%s</h2>', Yii::t( 'app', 'Tournament grid' ) ),
        'options' => [
            'table_class' => 'table table-striped table-bordered table-hover'
        ]
    ]) ?>

</div>
