<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NominationTournament */

$this->title = Yii::t('app', 'Create Nomination Tournament');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nomination Tournaments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nomination-tournament-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
