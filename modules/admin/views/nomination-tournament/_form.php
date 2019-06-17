<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NominationTournament */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nomination-tournament-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomination_id')->textInput() ?>

    <?= $form->field($model, 'tournament_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
