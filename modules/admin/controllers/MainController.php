<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\ClubSearch;
use app\models\Tournament;
use app\models\TournamentSearch;
use yii\data\ActiveDataProvider;

class MainController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $searchModelClub = new ClubSearch();
        $dataProviderClub = $searchModelClub->search(Yii::$app->request->queryParams);

        $searchModelTournament = new TournamentSearch();
        $dataProviderTournament = $searchModelTournament->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModelTournament' => $searchModelTournament,
            'dataProviderTournament' => $dataProviderTournament,

            'dataProviderClub' => $dataProviderClub,
            'searchModelClub' => $searchModelClub,
        ] );
    }
}
