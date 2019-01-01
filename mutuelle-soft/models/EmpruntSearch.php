<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Emprunt;

/**
 * EmpruntSearch represents the model behind the search form of `app\models\Emprunt`.
 */
class EmpruntSearch extends Emprunt
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idemprunt', 'enseignant_idenseignant'], 'integer'],
            [['montant', 'interet'], 'number'],
            [['session', 'databutoir'], 'safe'],
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
        $query = Emprunt::find();

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
            'idemprunt' => $this->idemprunt,
            'montant' => $this->montant,
            'interet' => $this->interet,
            'databutoir' => $this->databutoir,
            'enseignant_idenseignant' => $this->enseignant_idenseignant,
        ]);

        $query->andFilterWhere(['like', 'session', $this->session]);

        return $dataProvider;
    }
}
