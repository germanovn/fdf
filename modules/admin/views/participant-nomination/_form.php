<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Participant;
use app\models\Nomination;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\ParticipantNomination */
/* @var $form yii\widgets\ActiveForm */

$dropDownListParticipant  = ArrayHelper::map( Participant::find()->all(), 'id', 'fullName' );
//$dropDownListParticipant  = Participant::find()->select( [ 'first_name', 'middle_name', 'id' ] )->indexBy( 'id' )->column();
$dropDownListNomination   = Nomination::find()->select( [ 'name', 'id' ] )->indexBy( 'id' )->column();
?>

<div class="participant-nomination-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'participant_id')->dropDownList(
        $dropDownListParticipant,
        [ 'options' =>
            [ $model->participant_id => [ 'Selected' => 'selected' ] ]
        ]
    ) ?>

    <?= $form->field($model, 'nomination_id')->dropDownList( $dropDownListNomination, ['prompt' => Yii::t('app', 'Select Nomination...')] ) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
