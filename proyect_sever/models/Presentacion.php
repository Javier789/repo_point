<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Presentaciones".
 *
 * @property int $codigoProducto
 * @property double $costo
 * @property string $descripcion
 * @property string $foto
 * @property double $precioSugerido
 * @property double $ganancia
 * @property int $idProducto
 * @property int $idMarca
 * @property int $activo
 *
 * @property DetallesComporbante $detallesComporbante
 * @property Marca $marca
 * @property Producto $producto
 * @property Stock[] $stocks
 */
class Presentacion extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'Presentaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['codigoProducto', 'costo', 'descripcion', 'idProducto', 'idMarca'], 'required'],
                [['codigoProducto', 'idProducto', 'idMarca', 'activo'], 'integer'],
                [['costo', 'precioSugerido', 'ganancia'], 'number'],
                [['foto'], 'string'],
                [['descripcion'], 'string', 'max' => 200],
                [['codigoProducto', 'idMarca'], 'unique', 'targetAttribute' => ['codigoProducto', 'idMarca']],
                [['idMarca'], 'exist', 'skipOnError' => true, 'targetClass' => Marca::className(), 'targetAttribute' => ['idMarca' => 'codigoEmpresa']],
                [['idProducto'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['idProducto' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'codigoProducto' => 'Codigo Producto',
            'costo' => 'Costo',
            'descripcion' => 'Descripcion',
            'foto' => 'Foto',
            'precioSugerido' => 'Precio Sugerido',
            'ganancia' => 'Ganancia',
            'idProducto' => 'Id Producto',
            'idMarca' => 'Id Marca',
            'activo' => 'Activo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallesComporbante() {
        return $this->hasOne(DetallesComporbante::className(), ['idPresentacion' => 'codigoProducto', 'idMarca' => 'idMarca']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarca() {
        return $this->hasOne(Marca::className(), ['codigoEmpresa' => 'idMarca']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducto() {
        return $this->hasOne(Producto::className(), ['id' => 'idProducto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStock() {
        return $this->hasMany(Stock::className(), ['idPresentacion' => 'codigoProducto']); //, 'idMarca' => 'idMarca'
    }

    public function updateStock($cantidad) {
        $stock = $this->getStock()->one();
        $stock->agregarUnidades($cantidad);
    }

    public function delete() {
        $this->activo = 0;
        $this->save();
    }
    public function beforeSave($insert) {
        $categorias = Categoria::find()->all();
        foreach ( $categorias as $model )
        {
            $model->agregarDetalle($this->codigoProducto);
        }
        parent::beforeSave($insert);
    }
}
