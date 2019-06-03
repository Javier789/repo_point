<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "DetallesComporbante".
 *
 * @property int $idPresentacion
 * @property double $cantidad
 * @property int $idComprobante
 * @property double $importe
 * @property ComprobantesCompra $comprobante
 * @property Presentacion $presentacione
 */
class DetalleComprobante extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'DetallesComporbante';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPresentacion', 'cantidad', 'idComprobante'], 'required'],
            [['idPresentacion', 'idComprobante'], 'integer'],
            [['cantidad'], 'number'],
            [['idPresentacion', 'idComprobante'], 'unique', 'targetAttribute' => ['idPresentacion', 'idComprobante']],
            [['idComprobante'], 'exist', 'skipOnError' => true, 'targetClass' => ComprobantesCompra::className(), 'targetAttribute' => ['idComprobante' => 'id']],
            [['idPresentacion'], 'exist', 'skipOnError' => true, 'targetClass' => Presentacion::className(), 'targetAttribute' => ['idPresentacion' => 'codigoProducto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPresentacion' => 'Id Presentacion',
            'cantidad' => 'Cantidad',
            'idComprobante' => 'Id Comprobante',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComprobante()
    {
        return $this->hasOne(ComprobantesCompra::className(), ['id' => 'idComprobante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentacion()
    {
        return $this->hasOne(Presentacion::className(), ['codigoProducto' => 'idPresentacion']);
    }
}
