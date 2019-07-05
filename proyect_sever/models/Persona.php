<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Persona".
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property string $telefono
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
            [['nombre', 'apellido'], 'required'],
            [['nombre'], 'string', 'max' => 80],
            [['apellido', 'telefono'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'telefono' => 'Telefono',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocioComercials()
    {
        return $this->hasMany(SocioComercial::className(), ['encargado' => 'id']);
    }
}
