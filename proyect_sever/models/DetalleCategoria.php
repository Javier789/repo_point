<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "DetalleCategoria".
 *
 * @property int $idCategoria
 * @property int $idPresentacion
 * @property double $monto
 * @property string $descripcion
 * @property Categoria $categoria
 * @property Presentacion $presentacion
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
            [['monto'], 'number'],
            [['descripcion'], 'string', 'max' => 50],
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
            'monto' => 'Porcentaje Ganancia Socio',
        ];
    }
        public function fields() {
        return[
            'idCategoria',
            'idPresentacion',
            'monto',
            'descripcion',
            'nombreCategoria' => function (){return $this->categoria->nombre ;},
            'descripcionCategoria' => function (){return $this->categoria->descripcion ;}
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
        return $this->hasOne(Presentacion::className(), ['codigoProducto' => 'idPresentacion']);
    }
}
