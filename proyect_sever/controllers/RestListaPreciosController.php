<?php

namespace app\controllers;

use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
use app\models\DetalleCategoria;

class RestListaPreciosController extends ActiveController
{
    public $modelClass = 'app\models\DetalleCategoria';

    public function actions() {
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

    public function actionIndex($id)
    {
        $query = \app\models\DetalleCategoria::find();
        $query->where(['idPresentacion'=>$id]);
        return $query->all();
    }
    public function actionSave()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $lista = yii::$app->request->post();
        foreach ($lista as $data)
        {
            $detalle = new DetalleCategoria();
            if ($detalle->load($data)) {
                if (!$detalle->save()) {
                    return  $detalle->getErrors();
                }
            }else{
                return $detalle->getErrors();
            }
        }
    }
}
