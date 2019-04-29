<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Presentacion;

/**
 * PresentacionSearch represents the model behind the search form of `app\models\Presentacion`.
 */
class PresentacionSearch extends Presentacion {

    public $txtSearch;

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['txtSearch'], 'string', 'max' => 30]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios() {
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
    public function search($params) {
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
            'costo' => $this->costo,
            'precioSugerido' => $this->precioSugerido,
            'ganancia' => $this->ganancia,
            'idProducto' => $this->idProducto,
            'idMarca' => $this->idMarca
        ]);
        $query->andWhere(['=', 'activo', '1']);
        $query->join('LEFT JOIN', 'Productos', 'Presentaciones.idProducto = Productos.id');
        $query->andFilterWhere(
                ['or',
                        ['like', 'Productos.nombre', $this->txtSearch],
                        ['like', 'codigoProducto', $this->txtSearch],
                        ['like', 'Presentaciones.descripcion', $this->txtSearch],
        ]);
        return $dataProvider;
    }

}
