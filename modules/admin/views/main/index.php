<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
?>
<h1><?= Yii::t( 'app', 'Admin panel' ); ?></h1>

<?= GridView::widget([
    'dataProvider' => $dataProviderCity,
    'filterModel' => $searchModelCity,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'name',
    ],
]); ?>

<?= GridView::widget([
    'dataProvider' => $dataProviderClub,
    'filterModel' => $searchModelClub,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'name',
    ],
]); ?>


