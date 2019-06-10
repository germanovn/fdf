<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\City;

/* @var $this yii\web\View */
/* @var $model app\models\Club */
/* @var $form yii\widgets\ActiveForm */

$dropDownListCity = City::find()->select( [ 'name', 'id' ] )->indexBy( 'id' )->column();
?>

<div class="club-form">

    <?php if( !empty( $dropDownListCity ) && is_array( $dropDownListCity ) ) { ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'city_id')->dropDownList( $dropDownListCity ) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php }
    else { ?>
        <?= Yii::t( 'app', 'Add at least one city' ); ?>
    <?php } ?>
</div>
