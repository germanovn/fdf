<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Nomination;

/**
 * NominationSearch represents the model behind the search form of `app\models\Nomination`.
 */
class NominationSearch extends Nomination
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'qualifying_scheme_id', 'encounter_amount', 'participant_amount', 'qualifying_rounds_amount', 'final_rounds_amount', 'gender_restriction', 'age_of', 'age_up_to'], 'integer'],
            [['name', 'slug'], 'safe'],
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
        $query = Nomination::find();

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
            'qualifying_scheme_id' => $this->qualifying_scheme_id,
            'encounter_amount' => $this->encounter_amount,
            'participant_amount' => $this->participant_amount,
            'qualifying_rounds_amount' => $this->qualifying_rounds_amount,
            'final_rounds_amount' => $this->final_rounds_amount,
            'gender_restriction' => $this->gender_restriction,
            'age_of' => $this->age_of,
            'age_up_to' => $this->age_up_to,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
}
