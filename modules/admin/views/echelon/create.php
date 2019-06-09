<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Echelon */

$this->title = Yii::t('app', 'Create Echelon');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Echelons'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="echelon-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
