<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\QualifyingScheme;
use app\models\Gender;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NominationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Nominations');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nomination-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Nomination'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'qualifying_scheme_id',
                'filter' => QualifyingScheme::find()->select( [ 'name', 'id' ] )->indexBy( 'id' )->column(),
                'value' => 'qualifyingScheme.name',
            ],
            'encounter_amount',
            'participant_amount',
            'qualifying_rounds_amount',
            'final_rounds_amount',
            [
                'attribute' => 'gender_restriction',
                'filter' => Gender::find()->select( [ 'name', 'id' ] )->indexBy( 'id' )->column(),
                'value' => 'genderRestriction.name',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
