<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Gender;
use app\models\Club;
use app\models\Echelon;

/* @var $this yii\web\View */
/* @var $model app\models\Participant */
/* @var $form yii\widgets\ActiveForm */

$dropDownListGender  = Gender::find()->select( [ 'name', 'id' ] )->indexBy( 'id' )->column();
$dropDownListClub    = Club::find()->select( [ 'name', 'id' ] )->indexBy( 'id' )->column();
$dropDownListEchelon = Echelon::find()->select( [ 'name', 'id' ] )->indexBy( 'id' )->column();
?>

<div class="participant-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender_id')->dropDownList( $dropDownListGender ) ?>

    <?= $form->field($model, 'club_id')->dropDownList( $dropDownListClub ) ?>

    <?= $form->field($model, 'date_of_birth')->textInput() ?>

    <?= $form->field($model, 'echelon_id')->dropDownList( $dropDownListEchelon ) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
