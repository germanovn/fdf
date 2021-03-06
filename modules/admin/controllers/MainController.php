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

    public function actionFillDb()
    {
        $City_data = [
            [ 'name' => 'Екатеринбург' ],
            [ 'name' => 'Челябинск' ],
            [ 'name' => 'Пермь' ],
        ];

        $Club_data = [
            [ 'name' => 'NoName' ],
            [ 'name' => 'Club lovers D&D 3.5' ],
            [ 'name' => 'Club lovers D&D 5' ],
        ];

        $Echlon_data = [
            [ 'name' => 'Базовый' ],
            [ 'name' => 'Первая лига' ],
            [ 'name' => 'Турнир чемпионов' ],
        ];

        $Gender_data = [
            [ 'name' => 'Неизвестный', 'slug' => 'unknown' ],
            [ 'name' => 'Мужской',     'slug' => 'male' ],
            [ 'name' => 'Женский',     'slug' => 'female' ],
        ];

        $Participant_data = [
            [
                'surname'       => 'Ктотко',
                'first_name'    => 'Ктото',
                'middle_name'   => 'Ктотович',
                'gender_id'     => '1',
                'club_id'       => '1',
                'date_of_birth' => '1988-08-06',
                'echelon_id'    => '1',
            ],
            [
                'surname'       => 'Пушкин',
                'first_name'    => 'Алекс',
                'middle_name'   => 'Сергеевич',
                'gender_id'     => '2',
                'club_id'       => '1',
                'date_of_birth' => '1988-08-06',
                'echelon_id'    => '1',
            ],
            [
                'surname'       => 'Луддин',
                'first_name'    => 'Лера',
                'middle_name'   => 'Лидиевна',
                'gender_id'     => '3',
                'club_id'       => '1',
                'date_of_birth' => '1988-08-06',
                'echelon_id'    => '1',
            ],
            [
                'surname'       => 'Клубников',
                'first_name'    => 'Константин',
                'middle_name'   => 'Кириллович',
                'gender_id'     => '2',
                'club_id'       => '2',
                'date_of_birth' => '1988-08-06',
                'echelon_id'    => '2',
            ],
            [
                'surname'       => 'Клубникова',
                'first_name'    => 'Каралина',
                'middle_name'   => 'Кирилловна',
                'gender_id'     => '3',
                'club_id'       => '2',
                'date_of_birth' => '1988-08-06',
                'echelon_id'    => '2',
            ],
        ];

        $Nomination_data = [
            [
                'name'                      => 'Классика база ОКУ 2019',
                'slug'                      => 'klassika-baza-oku-2019',
                'qualifying_scheme_id'      => '1',
                'encounter_amount'          => '7',
                'participant_amount'        => '5',
                'qualifying_rounds_amount'  => '3',
                'final_rounds_amount'       => '3',
                'gender_restriction'        => '2',
                'age_of'                    => '21',
                'age_up_to'                 => '35',
            ],
            [
                'name'                      => 'Классика лига ОКУ 2019',
                'slug'                      => 'klassika-liga-oku-2019',
                'qualifying_scheme_id'      => '2',
                'encounter_amount'          => '7',
                'participant_amount'        => '5',
                'qualifying_rounds_amount'  => '3',
                'final_rounds_amount'       => '3',
                'gender_restriction'        => '3',
                'age_of'                    => '21',
                'age_up_to'                 => '35',
            ],
            [
                'name'                      => 'Классика база ДНД 2019',
                'slug'                      => 'klassika-baza-dnd-2019',
                'qualifying_scheme_id'      => '2',
                'encounter_amount'          => '7',
                'participant_amount'        => '5',
                'qualifying_rounds_amount'  => '3',
                'final_rounds_amount'       => '3',
                'gender_restriction'        => '2',
                'age_of'                    => '21',
                'age_up_to'                 => '35',
            ],
            [
                'name'                      => 'Классика лига СОП 2019',
                'slug'                      => 'klassika-liga-spo-2019',
                'qualifying_scheme_id'      => '3',
                'encounter_amount'          => '7',
                'participant_amount'        => '5',
                'qualifying_rounds_amount'  => '3',
                'final_rounds_amount'       => '3',
                'gender_restriction'        => '3',
                'age_of'                    => '21',
                'age_up_to'                 => '35',
            ],
        ];

        $ParticipantNomination_data = [
            [ 'participant_id' => '1', 'nomination_id' => '1' ],
            [ 'participant_id' => '1', 'nomination_id' => '2' ],
            [ 'participant_id' => '2', 'nomination_id' => '1' ],
            [ 'participant_id' => '2', 'nomination_id' => '2' ],
            [ 'participant_id' => '2', 'nomination_id' => '3' ],
            [ 'participant_id' => '3', 'nomination_id' => '2' ],
            [ 'participant_id' => '4', 'nomination_id' => '2' ],
            [ 'participant_id' => '4', 'nomination_id' => '3' ],
            [ 'participant_id' => '4', 'nomination_id' => '4' ],
            [ 'participant_id' => '5', 'nomination_id' => '4' ],
        ];

        $QualifyingSchemes_data = [
            [ 'name' => 'Швейцарская система' ],
            [ 'name' => 'круговая система' ],
            [ 'name' => 'олимпийская система' ],
        ];

        $Tournaments_data = [
            [ 'name' => 'Первый Турнир 2018' ],
            [ 'name' => 'Второй Турнир 2018' ],
            [ 'name' => 'Первый Турнир 2019' ],
        ];

        $NominationTournaments_data = [
            [ 'nomination_id' => '1', 'tournaments_id' => '1' ],
            [ 'nomination_id' => '2', 'tournaments_id' => '1' ],
            [ 'nomination_id' => '3', 'tournaments_id' => '1' ],
            [ 'nomination_id' => '4', 'tournaments_id' => '1' ],
            [ 'nomination_id' => '1', 'tournaments_id' => '3' ],
            [ 'nomination_id' => '3', 'tournaments_id' => '3' ],
        ];

        $Nomination = new \app\models\Nomination;

        foreach ( $Nomination_data as $row ) {

            foreach ( $row as $field_name => $value ) {
                $Nomination->$field_name = $value;
            }
//            $Nomination->insert( true, [ 'name','slug','qualifying_scheme_id','encounter_amount','participant_amount','qualifying_rounds_amount','final_rounds_amount','gender_restriction','age_of','age_up_to']);
        }
    }
}
