<?php

namespace app\controllers;
use yii;
use yii\rest\ActiveController;
use app\models\DetalleCategoria;

class RestListaPreciosController extends ActiveController {

    public $modelClass = 'app\models\DetalleCategoria';

    public function actions() {
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

    public function actionIndex($id) {
        $query = \app\models\DetalleCategoria::find();
        $query->where(['idPresentacion' => $id]);
        return $query->all();
    }

    public function actionSave() {
        yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $detalle = new DetalleCategoria();
        $detalle  = $detalle->find()->where(['idCategoria' => yii::$app->request->post()['idCategoria']])->andWhere(['idPresentacion'=>yii::$app->request->post()['idPresentacion']])->one();
        $detalle->setAttribute('monto', yii::$app->request->post()['monto']);
        $detalle->save();
        return $detalle->getErrors();
    }

}
