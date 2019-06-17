<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\NominationTournament */

$this->title = $model->nomination_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nomination Tournaments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="nomination-tournament-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'nomination_id' => $model->nomination_id, 'tournament_id' => $model->tournament_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'nomination_id' => $model->nomination_id, 'tournament_id' => $model->tournament_id], [
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
            'nomination_id',
            'tournament_id',
        ],
    ]) ?>

</div>
