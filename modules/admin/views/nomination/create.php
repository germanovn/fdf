<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Nomination */

$this->title = Yii::t('app', 'Create Nomination');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nominations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nomination-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
