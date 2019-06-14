<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Gender;
use app\models\Echelon;
use app\models\Club;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ParticipantSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Participants');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="participant-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Participant'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'surname',
            'first_name',
            'middle_name',
            [
                'attribute' => 'gender_id',
                'filter' => Gender::find()->select( [ 'name', 'id' ] )->indexBy( 'id' )->column(),
                'value' => 'gender.name',
            ],
            [
                'attribute' => 'club_id',
                'filter' => Club::find()->select( [ 'name', 'id' ] )->indexBy( 'id' )->column(),
                'value' => 'club.name',
            ],
            [
                'attribute' => 'echelon_id',
                'filter' => Echelon::find()->select( [ 'name', 'id' ] )->indexBy( 'id' )->column(),
                'value' => 'echelon.name',
            ],
            //'date_of_birth',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
