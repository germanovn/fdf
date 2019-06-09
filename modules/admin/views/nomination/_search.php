<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NominationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nomination-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'slug') ?>

    <?= $form->field($model, 'qualifying_scheme_id') ?>

    <?= $form->field($model, 'encounter_amount') ?>

    <?php // echo $form->field($model, 'participant_amount') ?>

    <?php // echo $form->field($model, 'qualifying_rounds_amount') ?>

    <?php // echo $form->field($model, 'final_rounds_amount') ?>

    <?php // echo $form->field($model, 'gender_restriction') ?>

    <?php // echo $form->field($model, 'age_of') ?>

    <?php // echo $form->field($model, 'age_up_to') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
