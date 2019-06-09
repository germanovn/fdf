<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Nomination */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nomination-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qualifying_scheme_id')->textInput() ?>

    <?= $form->field($model, 'encounter_amount')->textInput() ?>

    <?= $form->field($model, 'participant_amount')->textInput() ?>

    <?= $form->field($model, 'qualifying_rounds_amount')->textInput() ?>

    <?= $form->field($model, 'final_rounds_amount')->textInput() ?>

    <?= $form->field($model, 'gender_restriction')->textInput() ?>

    <?= $form->field($model, 'age_of')->textInput() ?>

    <?= $form->field($model, 'age_up_to')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
