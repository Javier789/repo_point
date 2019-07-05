<?php

namespace app\controllers;

use Yii;
use app\models\SocioComercial;
use app\models\SocioComercialSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * SocioComercialController implements the CRUD actions for SocioComercial model.
 */
class SocioComercialController extends Controller {

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
     * Lists all SocioComercial models.
     * @return mixed
     */
    public function actionIndex() {

        $searchModel = new SocioComercialSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // var_dump($searchModel);
        // echo'<br><br><br>------------------------';
        // var_dump($dataProvider);
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SocioComercial model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SocioComercial model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new SocioComercial();
        if (Yii::$app->request->post() && $model->guardarSocio(Yii::$app->request->post())) {
                return $this->redirect(['view', 'id' => $model->idSocioComercial]);
        } else {
            $encargado = new \app\models\Persona();
        }

        return $this->render('create', [
                    'model' => $model,
                    'encargado' => $encargado
        ]);
    }

    /**
     * Updates an existing SocioComercial model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $encargado = $model->getEncargado0()->one();
        if (Yii::$app->request->post() && $model->guardarSocio(Yii::$app->request->post())) {
            return $this->redirect(['view', 'id' => $model->idSocioComercial]);
        }

        return $this->render('update', [
                    'model' => $model,
                    'encargado' => $encargado
        ]);
    }

    /**
     * Deletes an existing SocioComercial model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SocioComercial model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SocioComercial the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = SocioComercial::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
