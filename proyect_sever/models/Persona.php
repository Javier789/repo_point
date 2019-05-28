<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Persona".
 *
 * @property int $nroDocumento
 * @property string $nombre
 * @property string $apellido
 *
 * @property SocioComercial[] $socioComercials
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Persona';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nroDocumento', 'nombre', 'apellido'], 'required'],
            [['nroDocumento'], 'integer'],
            [['nombre'], 'string', 'max' => 80],
            [['apellido'], 'string', 'max' => 45],
            [['nroDocumento'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nroDocumento' => 'Nro Documento',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocioComercials()
    {
        return $this->hasMany(SocioComercial::className(), ['encargado' => 'nroDocumento']);
    }
}
