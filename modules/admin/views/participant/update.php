<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Participant */

$item_name = sprintf( '%s %s %s', $model->surname, $model->first_name, $model->middle_name);

$this->title = Yii::t('app', 'Update Participant: {name}', [
    'name' => $item_name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Participants'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $item_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="participant-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
