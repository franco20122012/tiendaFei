<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CompraProducto;

/**
 * CompraproductoSearch represents the model behind the search form of `app\models\CompraProducto`.
 */
class CompraproductoSearch extends CompraProducto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['compra_id', 'producto_id', 'cantidad'], 'integer'],
            [['costo'], 'number'],
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
        $query = CompraProducto::find();

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
            'compra_id' => $this->compra_id,
            'producto_id' => $this->producto_id,
            'cantidad' => $this->cantidad,
            'costo' => $this->costo,
        ]);

        return $dataProvider;
    }
}
