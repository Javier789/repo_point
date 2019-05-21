<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "DetalleCategoria".
 *
 * @property int $idCategoria
 * @property int $idPresentacion
 * @property double $porcentajeGananciaSocio
 *
 * @property Categorium $categoria
 * @property Presentacione $presentacion
 */
class DetalleCategoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'DetalleCategoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCategoria', 'idPresentacion'], 'required'],
            [['idCategoria', 'idPresentacion'], 'integer'],
            [['porcentajeGananciaSocio'], 'number'],
            [['idCategoria', 'idPresentacion'], 'unique', 'targetAttribute' => ['idCategoria', 'idPresentacion']],
            [['idCategoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['idCategoria' => 'idCategoria']],
            [['idPresentacion'], 'exist', 'skipOnError' => true, 'targetClass' => Presentacion::className(), 'targetAttribute' => ['idPresentacion' => 'codigoProducto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCategoria' => 'Id Categoria',
            'idPresentacion' => 'Id Presentacion',
            'porcentajeGananciaSocio' => 'Porcentaje Ganancia Socio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['idCategoria' => 'idCategoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentacion()
    {
        return $this->hasOne(Presentacione::className(), ['codigoProducto' => 'idPresentacion']);
    }
}
