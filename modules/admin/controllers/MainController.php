<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\ClubSearch;
use app\models\Tournament;
use yii\data\ActiveDataProvider;

class MainController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $searchModelClub = new ClubSearch();
        $dataProviderClub = $searchModelClub->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'modelTournament' => Tournament::findOne( 2 ),

            'dataProviderClub' => $dataProviderClub,
            'searchModelClub' => $searchModelClub,
        ] );
    }
}
