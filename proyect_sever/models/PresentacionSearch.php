<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Presentacion;

/**
 * PresentacionSearch represents the model behind the search form of `app\models\Presentacion`.
 */
class PresentacionSearch extends Presentacion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigoProducto', 'idProducto', 'idMarca'], 'integer'],
            [['costoXUntidad', 'porcentajeRecargo', 'valorRecargo'], 'number'],
            [['descripcion', 'foto'], 'safe'],
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
        $query = Presentacion::find();

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
            'codigoProducto' => $this->codigoProducto,
            'costoXUntidad' => $this->costoXUntidad,
            'porcentajeRecargo' => $this->porcentajeRecargo,
            'valorRecargo' => $this->valorRecargo,
            'idProducto' => $this->idProducto,
            'idMarca' => $this->idMarca,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
}
