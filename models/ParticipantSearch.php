<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Participant;

/**
 * ParticipantSearch represents the model behind the search form of `app\models\Participant`.
 */
class ParticipantSearch extends Participant
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'gender_id', 'club_id', 'echelon_id'], 'integer'],
            [['surname', 'first_name', 'middle_name', 'date_of_birth'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Participant::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'gender_id' => $this->gender_id,
            'club_id' => $this->club_id,
            'date_of_birth' => $this->date_of_birth,
            'echelon_id' => $this->echelon_id,
        ]);

        $query->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'middle_name', $this->middle_name]);

        return $dataProvider;
    }
}
