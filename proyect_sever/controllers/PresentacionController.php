<?php

namespace app\controllers;

use Yii;
use app\models\Presentacion;
use app\models\PresentacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\FormEpressPresentacion;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

/**
 * PresentacionController implements the CRUD actions for Presentacion model.
 */
class PresentacionController extends Controller {

    public $layout = 'main_dashboard';

    /**
     * {@inheritdoc}
     */
    public function behaviors() {

        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                        [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
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
            $file = UploadedFile::getInstance($model, 'foto');
            if ($file) {
                $imagenComprimidaBase64 = \app\models\ImageManager::transformImage(false, 470, 470, $file->type, $file->tempName);
                $model->setAttribute('foto', $imagenComprimidaBase64);
            }
            if ($model->save()) {
                $stock = new \app\models\Stock();
                $stock->setAttributes(['cantidad' => 0, 'fechaActualizacion' => date('Y-m-d'), 'idPresentacion' => $model->codigoProducto], true);
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
                $imagenComprimidaBase64 = \app\models\ImageManager::transformImage(false, 470, 470, $file->type, $file->tempName);
                $model->setAttribute('foto', $imagenComprimidaBase64);
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
    /**
     * Accion para la carga de lista de compras
     * @return type
     */
    public function actionUpdateSpress() {
        $stockData = new FormEpressPresentacion();
        $stockData->load(Yii::$app->request->post());
        $dataProvider = Presentacion::findOne(['codigoProducto' => $stockData->codigoProducto]);
        
        
        $listArticuloComprobante=new ActiveDataProvider([
            'query' => \app\models\DetalleComprobante::find()->where(['idComprobante' => $stockData->numeroComprobante])->orderBy('idComprobante DESC'),
            'pagination' => [
                'pageSize' => 8,
            ],
        ]);
   
        /* if ($model->load(Yii::$app->request->post()) && $model->save()) {
          return $this->redirect(['view', 'codigoProducto' => $model->codigoProducto, 'idMarca' => $model->idMarca]);
          } */
        
        return $this->render('update-spress', [
                    'model' => $dataProvider,
                    'stockData' => $stockData,
                    'listArtComp' => $listArticuloComprobante
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

    /**
     * Accion que actualiza el stock de los productos
     * @return type
     */
    public function actionUpdateStock() {

        $dataStock = new FormEpressPresentacion();

        //
        if (Yii::$app->request->post()) {
            $dataStock->load(Yii::$app->request->post());
        } else {
            return $this->redirect(['update-spress',
                        'model' => null,
                        'stockData' => $dataStock
            ]);
        }

        $model = Presentacion::findOne(['codigoProducto' => $dataStock->codigoProducto]);
        
        $listArticuloComprobante=new ActiveDataProvider([
            'query' => \app\models\DetalleComprobante::find()->where(['idComprobante' => $dataStock->numeroComprobante])->orderBy('idComprobante DESC'),
            'pagination' => [
                'pageSize' => 8,
            ],
        ]);

        if ($model) {
            $model->updateStock($dataStock->cantidad);

            $dataStock->cantidad = 1;
            $dataStock->codigoProducto = null;
            return $this->render('update-spress', [
                        'model' => null,
                        'stockData' => $dataStock,
                        'listArtComp' => $listArticuloComprobante
            ]);
        }

        /* */

        //echo '<h1>PASAMOS ...'.$dataStock->codigo.'</h1>';
        return $this->redirect(['update-spress']);
        //crear un nuevo comprobante, si no existe y agregarle el detalle
        $comprobante = \app\models\ComprobantesCompra::find(['id' => $dataStock->numeroComprobante])->one();
        if ($comprobante) {
            $comprobante->agregarDetalle($dataStock->cantidad, $dataStock->codigoProducto);
        } else {
            $comprobante = new \app\models\ComprobantesCompra();
            $comprobante->fechaIngreso = date('Y-m-d');
            if ($comprobante->save()) {
                $comprobante->agregarDetalle($dataStock->cantidad, $dataStock->codigoProducto);
            }
        }
        $dataStock->cantidad = null;
        $dataStock->codigoProducto = null;
        return $this->redirect(['update-spress',
                    'model' => null,
                    'stockData' => $dataStock
        ]);
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
