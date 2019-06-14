<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use app\widgets\ParticipantNominationTable;

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

    <?= ParticipantNominationTable::widget([
        'dataProvider' => $dataProvider,
    ]) ?>

</div>
