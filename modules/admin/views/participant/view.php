<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Participant */

$this->title = $model->fullName;

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

    <p>
        <?= Html::a(Yii::t('app', 'Add Nomination'), ['participant-nomination/create', 'participant_id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => new \yii\data\ActiveDataProvider( [ 'query' => $model->getNominations() ] ),
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',

            [
                'class' => 'yii\grid\ActionColumn',
//                'controller' => 'participant-nomination',
                'urlCreator'=>function($action, $model, $key, $index){
                    $controller = 'participant-nomination';
                    return sprintf( '/%s/%s?%s',
                        $controller,
                        $action,
                        sprintf( 'participant_id=%d&nomination_id=%d',
                            Yii::$app->request->get('id'),
                            $model->id
                        )
                    );
                },
            ],
        ],
    ]); ?>

</div>
