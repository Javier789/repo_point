<?php

namespace app\controllers;

use Yii;
use app\models\Presentacion;
use app\models\PresentacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PresentacionController implements the CRUD actions for Presentacion model.
 */
class PresentacionController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Presentacion models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PresentacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

  

    /**
     * Creates a new Presentacion model.
     * If creation is successful, the browser will be redirected to the 'Index' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Presentacion();
        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            //return var_dump(UploadedFile::getInstance($model, 'foto'));
            $file = UploadedFile::getInstance($model, 'foto');
            $model->setAttribute('foto', 'data:' . $file->type . ';base64,' . base64_encode(file_get_contents($file->tempName)));
            if ($model->save()) {
                $stock = new \app\models\Stock();
                $stock->setAttributes(['cantidad'=> 0, 'fechaActualizacion' => date('Y-m-d'), 'idPresentacion'=> $model->idProducto ], true);
                $stock->save();
                return $this->redirect(
                                ['index']);
            }
        }
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Presentacion model.
     * If update is successful, the browser will be redirected to the 'Index' page.
     * @param integer $codigoProducto
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($codigoProducto) {
        $model = $this->findModel($codigoProducto);
        $fotoActual = $model->foto;
        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            if (UploadedFile::getInstance($model, 'foto')) {
                $file = UploadedFile::getInstance($model, 'foto');
                $model->setAttribute('foto', 'data:' . $file->type . ';base64,' . base64_encode(file_get_contents($file->tempName)));
            } else {
                $model->foto = $fotoActual;
            }
            if ($model->save()) {
                return $this->redirect(
                                ['index']);
            }
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }
  public function actionUpdateSpress()
    {
        $searchModel = new PresentacionSearch();
        $dataProvider = $searchModel->searchCodigo(Yii::$app->request->queryParams);


       /* if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'codigoProducto' => $model->codigoProducto, 'idMarca' => $model->idMarca]);
        }*/

        return $this->render('update-spress', [
            'searchModel' => $searchModel,
            'model' => $dataProvider,
        ]);
    }
    /**
     * Deletes an existing Presentacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $codigoProducto
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($codigoProducto) {
        $this->findModel($codigoProducto)->delete();
        return $this->redirect(['index']);
    }
    
    public function updateStock($codigoProducto)
    {
        $model = $this->findModel($codigoProducto);
        $cantidad = Yii::$app->request->post('cantidad');
        $model->updateStock($cantidad);
        $nroComprobante = Yii::$app->request->post('nroComprobante');
        //crear un nuevo comprobante, si no existe y agregarle el detalle
        return $this->redirect(['update-spress']);
    }

    /**
     * Finds the Presentacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $codigoProducto
     * @return Presentacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($codigoProducto) {
        if (($model = Presentacion::findOne(['codigoProducto' => $codigoProducto])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
