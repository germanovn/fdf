<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Nomination;
use app\models\Tournament;

/* @var $this yii\web\View */
/* @var $model app\models\NominationTournament */
/* @var $form yii\widgets\ActiveForm */

$dropDownListNomination = Nomination::find()->select( [ 'name', 'id' ] )->indexBy( 'id' )->column();
$dropDownListTournament = Tournament::find()->select( [ 'name', 'id' ] )->indexBy( 'id' )->column();
?>

<div class="nomination-tournament-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tournament_id')->dropDownList( $dropDownListTournament, ['prompt' => Yii::t('app', 'Select Tournament...')] ) ?>

    <?= $form->field($model, 'nomination_id')->dropDownList( $dropDownListNomination, ['prompt' => Yii::t('app', 'Select Nomination...')] ) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
