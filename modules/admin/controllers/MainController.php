<?php

namespace app\modules\admin\controllers;

use app\models\City;
use app\models\CitySearch;
use app\models\Club;
use app\models\ClubSearch;
use yii\data\ActiveDataProvider;

class MainController extends \yii\web\Controller
{
    public function actionIndex()
    {

        $dataProviderCity = new ActiveDataProvider([
            'query' => City::find(),
        ]);

        $searchModelCity = new CitySearch();

        $dataProviderClub = new ActiveDataProvider([
            'query' => Club::find(),
        ]);

        $searchModelClub = new ClubSearch();

        return $this->render('index', compact('dataProviderCity', 'searchModelCity', 'dataProviderClub', 'searchModelClub') );
    }
}
