<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Epargne;

/**
 * EpargneSearch represents the model behind the search form of `app\models\Epargne`.
 */
class EpargneSearch extends Epargne
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idepargne', 'enseignant_idenseignant'], 'integer'],
            [['montant'], 'number'],
            [['session'], 'safe'],
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
        $query = Epargne::find();

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
            'idepargne' => $this->idepargne,
            'montant' => $this->montant,
            'enseignant_idenseignant' => $this->enseignant_idenseignant,
        ]);

        $query->andFilterWhere(['like', 'session', $this->session]);

        return $dataProvider;
    }
}
