<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\City;
use app\widgets\TournamentWidget;

/* @var $this yii\web\View */
?>
<h1><?= Yii::t( 'app', 'Admin panel' ); ?></h1>

<?php foreach ( $dataProviderTournament->getModels() as $modelTournament ) { ?>
<?= TournamentWidget::widget([
    'model' => $modelTournament,
    'title' => sprintf( Yii::t( 'app', 'Tournament grid: %s' ), $modelTournament->name ),
    'options' => [
        'table_class' => 'table table-striped table-bordered table-hover'
    ]
]) ?>
<?php } ?>

<?= GridView::widget([
    'dataProvider' => $dataProviderClub,
    'filterModel' => $searchModelClub,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'name',
        [
            'attribute' => 'city_id',
            'filter' => City::find()->select( [ 'name', 'id' ] )->indexBy( 'id' )->column(),
            'value' => 'city.name',
        ],

    ],
]); ?>


