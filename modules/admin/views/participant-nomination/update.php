<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ParticipantNomination */

$this->title = Yii::t('app', 'Update Participant Nomination: {name}', [
    'name' => $model->participant_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Participant Nominations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->participant_id, 'url' => ['view', 'participant_id' => $model->participant_id, 'nomination_id' => $model->nomination_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="participant-nomination-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
