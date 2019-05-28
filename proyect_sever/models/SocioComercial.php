<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "SocioComercial".
 *
 * @property int $idSocioComercial
 * @property string $fechaIngreso
 * @property resource $diasAtencion
 * @property string $rubro
 * @property string $direccion
 * @property string $localidad
 * @property string $tipoSocio
 * @property int $encargado
 *
 * @property Persona $encargado0
 */
class SocioComercial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'SocioComercial';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idSocioComercial', 'fechaIngreso', 'diasAtencion', 'rubro', 'localidad', 'tipoSocio', 'encargado'], 'required'],
            [['idSocioComercial', 'encargado'], 'integer'],
            [['fechaIngreso'], 'safe'],
            [['diasAtencion'], 'string'],
            [['rubro'], 'string', 'max' => 100],
            [['direccion'], 'string', 'max' => 150],
            [['localidad', 'tipoSocio'], 'string', 'max' => 60],
            [['idSocioComercial'], 'unique'],
            [['encargado'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['encargado' => 'nroDocumento']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idSocioComercial' => 'Id Socio Comercial',
            'fechaIngreso' => 'Fecha Ingreso',
            'diasAtencion' => 'Dias Atencion',
            'rubro' => 'Rubro',
            'direccion' => 'Direccion',
            'localidad' => 'Localidad',
            'tipoSocio' => 'Tipo Socio',
            'encargado' => 'Encargado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncargado0()
    {
        return $this->hasOne(Persona::className(), ['nroDocumento' => 'encargado']);
    }
}
