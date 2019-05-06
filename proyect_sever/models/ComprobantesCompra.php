<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ComprobantesCompra".
 *
 * @property int $id
 * @property string $tipoComprobante
 * @property string $proveedor
 * @property string $fechaIngreso
 *
 * @property DetallesComporbante[] $detallesComporbantes
 * @property Presentacione[] $presentacions
 */
class ComprobantesCompra extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ComprobantesCompra';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tipoComprobante'], 'required'],
            [['id'], 'integer'],
            [['fechaIngreso'], 'safe'],
            [['tipoComprobante'], 'string', 'max' => 50],
            [['proveedor'], 'string', 'max' => 100],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipoComprobante' => 'Tipo Comprobante',
            'proveedor' => 'Proveedor',
            'fechaIngreso' => 'Fecha Ingreso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallesComporbantes()
    {
        return $this->hasMany(DetallesComporbante::className(), ['idComprobante' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentacions()
    {
        return $this->hasMany(Presentacione::className(), ['codigoProducto' => 'idPresentacion'])->viaTable('DetallesComporbante', ['idComprobante' => 'id']);
    }
}
