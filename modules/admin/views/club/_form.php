<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Club */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="club-form">

    <?php// if( !empty( $dropDownListCity ) && is_array( $dropDownListCity ) ) { ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'city_id')->dropDownList( $model->city ) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php// }
    //else { ?>
        <?= Yii::t( 'app', 'Add at least one city' ); ?>
    <?php// } ?>

</div>
