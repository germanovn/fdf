<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Participant Nominations');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="participant-nomination-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Participant Nomination'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(
                ( sprintf( '<p>%s:</p><p>%s</p>', $model->participant->fullName, $model->nomination->name ) ),
                ['view', 'participant_id' => $model->participant_id, 'nomination_id' => $model->nomination_id]
            );
        },
    ]) ?>


</div>
