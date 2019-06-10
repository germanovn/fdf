<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\City;
use app\models\CitySearch;
use app\models\Club;
use app\models\ClubSearch;
use yii\data\ActiveDataProvider;

class MainController extends \yii\web\Controller
{
    public function actionIndex()
    {

        $searchModelCity = new CitySearch();
        $dataProviderCity = $searchModelCity->search(Yii::$app->request->queryParams);


        $searchModelClub = new ClubSearch();
        $dataProviderClub = $searchModelClub->search(Yii::$app->request->queryParams);

        return $this->render('index', compact('dataProviderCity', 'searchModelCity', 'dataProviderClub', 'searchModelClub') );
    }
}
