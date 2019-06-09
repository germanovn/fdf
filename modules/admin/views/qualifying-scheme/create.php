<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\QualifyingScheme */

$this->title = Yii::t('app', 'Create Qualifying Scheme');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Qualifying Schemes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qualifying-scheme-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
