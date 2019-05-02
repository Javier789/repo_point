<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Stock".
 *
 * @property int $id
 * @property double $cantidad
 * @property string $fechaActualizacion
 * @property int $idPresentacion
 *
 * @property Presentacione $presentacion
 */
class Stock extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Stock';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cantidad'], 'number'],
            [['fechaActualizacion', 'idPresentacion'], 'required'],
            [['fechaActualizacion'], 'safe'],
            [['idPresentacion'], 'integer'],
            [['idPresentacion'], 'exist', 'skipOnError' => true, 'targetClass' => Presentacion::className(), 'targetAttribute' => ['idPresentacion' => 'codigoProducto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cantidad' => 'Cantidad',
            'fechaActualizacion' => 'Fecha Actualizacion',
            'idPresentacion' => 'Id Presentacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentacion()
    {
        return $this->hasOne(Presentacion::className(), ['codigoProducto' => 'idPresentacion']);
    }
    public function agregarUnidades(int $cantidad)
    {
        $this->cantidad = $this->cantidad + $cantidad;
        $this->fechaActualizacion = date("Y-m-d");
        $this->save();
    }
}
