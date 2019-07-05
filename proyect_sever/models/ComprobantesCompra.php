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
 * @property string $nroComprobante
 *
 * @property DetallesComporbante[] $detallesComporbantes
 * @property Presentacion[] $presentacions
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
    //Constante del tipo de comprobante
    static $COMPROBANTE_TIPO=['OTRO'=>'Otro','FACTURA'=>'Factura','REMITO'=>'Remito','RECIBO'=>'Recibo'];

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fechaIngreso'], 'safe'],
            [['nroComprobante'], 'required'],
            [['tipoComprobante'], 'string', 'max' => 50],
            [['proveedor', 'nroComprobante'], 'string', 'max' => 100],
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
        return $this->hasMany(DetalleComprobante::className(), ['idComprobante' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentacions()
    {
        return $this->hasMany(Presentacion::className(), ['codigoProducto' => 'idPresentacion'])->viaTable('DetallesComporbante', ['idComprobante' => 'id']);
    }
    /**
     * Agrega un detalle al comprobante actual,
     * en caso de que ya exista un detalle para el pructo indicado
     * se suman las cantidades.
     * @param type $cantidadProductos
     * @param type $codigo
     * @return type
     */
    public function agregarDetalle( $cantidadProductos, $codigo)
    {
        $detalleExiste = DetalleComprobante::find()->where(['idComprobante'=> $this->id, 'idPresentacion'=> $codigo])->one();
        if ($detalleExiste) {
            $detalleExiste->cantidad = $detalleExiste->cantidad + $cantidadProductos;
            return $detalleExiste->save();
        }
        $detalle = new DetalleComprobante();
        $detalle->idComprobante = $this->id;
        $detalle->cantidad = $cantidadProductos;
        $detalle->idPresentacion = $codigo;
        return $detalle->save();
    }
    public function total()
    {
        $total = 0;
        foreach ($this->getDetallesComporbantes()->all() as $d)
        {
            $total += $d->cantidad * $d->presentacion->costo;
        }
        return $total;
    }
    
}
