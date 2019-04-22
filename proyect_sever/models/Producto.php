<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Productos".
 *
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 *
 * @property Presentacione[] $presentaciones
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 50],
            [['descripcion'], 'string', 'max' => 200],
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
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresentaciones()
    {
        return $this->hasMany(Presentacione::className(), ['idProducto' => 'id']);
    }
}
