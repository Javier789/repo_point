<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Presentaciones".
 *
 * @property int $codigoProducto
 * @property double $costoXUntidad
 * @property string $descripcion
 * @property string $foto
 * @property double $porcentajeRecargo
 * @property double $valorRecargo
 * @property int $idProducto
 * @property int $idMarca
 *
 * @property DetallesComporbante $detallesComporbante
 * @property Marca $marca
 * @property Producto $producto
 * @property Stock[] $stocks
 */
class Presentacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Presentaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigoProducto', 'costoXUntidad', 'descripcion', 'idProducto', 'idMarca'], 'required'],
            [['codigoProducto', 'idProducto', 'idMarca'], 'integer'],
            [['costoXUntidad', 'porcentajeRecargo', 'valorRecargo'], 'number'],
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
    public function attributeLabels()
    {
        return [
            'codigoProducto' => 'Codigo Producto',
            'costoXUntidad' => 'Costo X Untidad',
            'descripcion' => 'Descripcion',
            'foto' => 'Foto',
            'porcentajeRecargo' => 'Porcentaje Recargo',
            'valorRecargo' => 'Valor Recargo',
            'idProducto' => 'Id Producto',
            'idMarca' => 'Id Marca',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallesComporbante()
    {
        return $this->hasOne(DetallesComporbante::className(), ['idPresentacion' => 'codigoProducto', 'idMarca' => 'idMarca']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarca()
    {
        return $this->hasOne(Marca::className(), ['codigoEmpresa' => 'idMarca']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Producto::className(), ['id' => 'idProducto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStocks()
    {
        return $this->hasMany(Stock::className(), ['idPresentacion' => 'codigoProducto', 'idMarca' => 'idMarca']);
    }
    

}
