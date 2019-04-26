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
class PresentacionController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
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
    public function actionIndex()
    {
        $searchModel = new PresentacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Presentacion model.
     * @param integer $codigoProducto
     * @param integer $idMarca
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($codigoProducto, $idMarca)
    {
        return $this->render('view', [
            'model' => $this->findModel($codigoProducto, $idMarca),
        ]);
    }

    /**
     * Creates a new Presentacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Presentacion();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             $file = UploadedFile::getInstance($model,'foto');
             var_dump($file->name);
             var_dump($file);
            var_dump($_FILES);
            var_dump(file_get_contents($file->tempName));
            //return $this->redirect(['view', 'codigoProducto' => $model->codigoProducto, 'idMarca' => $model->idMarca]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Presentacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $codigoProducto
     * @param integer $idMarca
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($codigoProducto, $idMarca)
    {
        $model = $this->findModel($codigoProducto, $idMarca);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'codigoProducto' => $model->codigoProducto, 'idMarca' => $model->idMarca]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Presentacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $codigoProducto
     * @param integer $idMarca
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($codigoProducto, $idMarca)
    {
        $this->findModel($codigoProducto, $idMarca)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Presentacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $codigoProducto
     * @param integer $idMarca
     * @return Presentacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($codigoProducto, $idMarca)
    {
        if (($model = Presentacion::findOne(['codigoProducto' => $codigoProducto, 'idMarca' => $idMarca])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
