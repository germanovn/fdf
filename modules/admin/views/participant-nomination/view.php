<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ParticipantNomination */

$this->title = Yii::t('app', "Participant: {participant-name}. Nomination: {nomination-name}", [
    'participant-name' => $model->participant->FullName,
    'nomination-name' => $model->nomination->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Participant Nominations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="participant-nomination-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'participant_id' => $model->participant_id, 'nomination_id' => $model->nomination_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'participant_id' => $model->participant_id, 'nomination_id' => $model->nomination_id], [
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
            [
                'attribute' => 'participant_id',
                'value' => $model->participant->FullName,

            ],
            [
                'attribute' => 'nomination_id',
                'value' => $model->nomination->name,

            ],
        ],
    ]) ?>

</div>
