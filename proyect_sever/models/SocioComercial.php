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
 * @property string $razonSocial
 * @property string $telefono
 * @property string $cuit
 * @property string $condicionTributaria
 * @property string $activo 
 *
 * @property Persona $encargado0
 */
class SocioComercial extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'SocioComercial';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['fechaIngreso', 'diasAtencion', 'rubro', 'localidad', 'tipoSocio', 'encargado', 'razonSocial', 'cuit'], 'required'],
                [['idSocioComercial', 'encargado'], 'integer'],
                [['fechaIngreso'], 'safe'],
                [['diasAtencion'], 'string'],
                [['rubro'], 'string', 'max' => 100],
                [['direccion'], 'string', 'max' => 150],
                [['localidad', 'tipoSocio', 'razonSocial'], 'string', 'max' => 60],
                [['telefono', 'cuit', 'condicionTributaria'], 'string', 'max' => 45],
                [['idSocioComercial'], 'unique'],
                [['encargado'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['encargado' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'idSocioComercial' => 'Id Socio Comercial',
            'fechaIngreso' => 'Fecha Ingreso',
            'diasAtencion' => 'Dias Atencion',
            'rubro' => 'Rubro',
            'direccion' => 'Direccion',
            'localidad' => 'Localidad',
            'tipoSocio' => 'Tipo Socio',
            'encargado' => 'Encargado',
            'razonSocial' => 'Razon Social',
            'telefono' => 'Telefono',
            'cuit' => 'Cuit',
            'condicionTributaria' => 'Condicion Tributaria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncargado0() {
        return $this->hasOne(Persona::className(), ['id' => 'encargado']);
    }

    public function guardarSocio($data) {
        $transaction = \Yii::$app->db->beginTransaction();
        $encargado = $this->getEncargado0()->one();
        if (!$encargado) {
            $encargado = new Persona();
        }
        if ($this->load($data)) {
            if ($encargado->load($data) && $encargado->save()) {
                $this->encargado = $encargado->id;
                $this->fechaIngreso = $this->getFechaIngreso();
                if ($this->save()) {
                    $transaction->commit();
                    return true;
                } else {
                    $transaction->rollBack();
                    return false;
                }
            } else {
                $transaction->rollBack();
                return false;
            }
        }
    }

    private function getFechaIngreso() {
        return $this->fechaIngreso ? $this->fechaIngreso : date('Y-m-d');
    }

    public function delete() {
        $this->activo = 0;
        $this->save();
    }

}
