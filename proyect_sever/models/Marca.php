<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Marcas".
 *
 * @property int $codigoEmpresa
 * @property string $nombre
 * @property string $descripcion
 *
 * @property Presentacione[] $presentaciones
 */
class Marca extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Marcas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigoEmpresa', 'nombre'], 'required'],
            [['codigoEmpresa'], 'integer'],
            [['nombre'], 'string', 'max' => 50],
            [['descripcion'], 'string', 'max' => 200],
            [['codigoEmpresa'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'codigoEmpresa' => 'Codigo Empresa',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentaciones()
    {
        return $this->hasMany(Presentacione::className(), ['idMarca' => 'codigoEmpresa']);
    }
}
