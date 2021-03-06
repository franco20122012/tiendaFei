<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ClienteDomicilio;

/**
 * ClienteDomicilioSearch represents the model behind the search form of `app\models\ClienteDomicilio`.
 */
class ClienteDomicilioSearch extends ClienteDomicilio
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cliente_id', 'domicilio_id'], 'integer'],
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
        $query = ClienteDomicilio::find();

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
            'cliente_id' => $this->cliente_id,
            'domicilio_id' => $this->domicilio_id,
        ]);

        return $dataProvider;
    }
}
