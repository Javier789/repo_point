<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SocioComercial;

/**
 * SocioComercialSearch represents the model behind the search form of `app\models\SocioComercial`.
 */
class SocioComercialSearch extends SocioComercial
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idSocioComercial', 'encargado'], 'integer'],
            [['fechaIngreso', 'diasAtencion', 'rubro', 'direccion', 'localidad', 'tipoSocio'], 'safe'],
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
        $query = SocioComercial::find();

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
            'idSocioComercial' => $this->idSocioComercial,
            'fechaIngreso' => $this->fechaIngreso,
            'encargado' => $this->encargado,
        ]);

        $query->andFilterWhere(['like', 'diasAtencion', $this->diasAtencion])
            ->andFilterWhere(['like', 'rubro', $this->rubro])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'localidad', $this->localidad])
            ->andFilterWhere(['like', 'tipoSocio', $this->tipoSocio]);

        return $dataProvider;
    }
}
