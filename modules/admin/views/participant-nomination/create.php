<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ParticipantNomination */

$this->title = Yii::t('app', 'Create Participant Nomination');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Participant Nominations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="participant-nomination-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
