<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\Participant */

$this->title = sprintf( '%s %s %s', $model->surname, $model->first_name, $model->middle_name);

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Participants'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="participant-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'surname',
            'first_name',
            'middle_name',
            [
                'attribute' => 'gender_id',
                'value' => ArrayHelper::getValue( $model, 'gender.name' ),

            ],
            [
                'attribute' => 'club_id',
                'value' => ArrayHelper::getValue( $model, 'club.name' ),

            ],
            'date_of_birth',
            [
                'attribute' => 'echelon_id',
                'value' => ArrayHelper::getValue( $model, 'echelon.name' ),

            ],
        ],
    ]) ?>

</div>
