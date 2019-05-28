<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Categoria".
 *
 * @property int $idCategoria
 * @property string $nombre
 * @property string $descripcion
 *
 * @property DetalleCategorium[] $detalleCategoria
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Categoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 45],
            [['descripcion'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCategoria' => 'Id Categoria',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleCategoria()
    {
        return $this->hasMany(DetalleCategoria::className(), ['idCategoria' => 'idCategoria']);
    }

    public function agregarDetalle($idPresentacion)
    {
        $detalle = new DetalleCategoria();
        $detalle->setAttribute('idCategoria', $this->idCategoria);
        $detalle->setAttribute('idPresentacion', $idPresentacion);
        $detalle->setAttribute('monto', 20);
        return $detalle->save();
    }
   
}
