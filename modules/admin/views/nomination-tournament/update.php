<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NominationTournament */

$this->title = Yii::t('app', 'Update Nomination Tournament: {name}', [
    'name' => $model->nomination_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nomination Tournaments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nomination_id, 'url' => ['view', 'nomination_id' => $model->nomination_id, 'tournament_id' => $model->tournament_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="nomination-tournament-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
