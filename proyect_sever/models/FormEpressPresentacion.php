<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace app\models;
use yii\base\Model;

/**
 * Description of FormEpressPresentacion
 *
 * @author campofacil
 */
class FormEpressPresentacion extends Model {
    //put your code here
    public $codigoProducto;
    public $cantidad;
    public $numeroComprobante;
    
    public function rules(){
        {
        return [
            [['codigoProducto', 'cantidad','numeroComprobante'], 'required'],
            [['codigoProducto', 'cantidad','numeroComprobante'], 'number'],
        ];
    }
    }
}
