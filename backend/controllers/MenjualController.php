<?php

namespace backend\controllers;

use Yii;
use common\models\Menjual\Menjual;
use common\models\Menjual\MenjualSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MenjualController implements the CRUD actions for Menjual model.
 */
class MenjualController extends Controller
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
     * Lists all Menjual models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MenjualSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Menjual model.
     * @param string $nip_karyawan
     * @param string $kode_barang
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($nip_karyawan, $kode_barang)
    {
        return $this->render('view', [
            'model' => $this->findModel($nip_karyawan, $kode_barang),
        ]);
    }

    /**
     * Creates a new Menjual model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Menjual();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nip_karyawan' => $model->nip_karyawan, 'kode_barang' => $model->kode_barang]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Menjual model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $nip_karyawan
     * @param string $kode_barang
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($nip_karyawan, $kode_barang)
    {
        $model = $this->findModel($nip_karyawan, $kode_barang);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nip_karyawan' => $model->nip_karyawan, 'kode_barang' => $model->kode_barang]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Menjual model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $nip_karyawan
     * @param string $kode_barang
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($nip_karyawan, $kode_barang)
    {
        $this->findModel($nip_karyawan, $kode_barang)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Menjual model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $nip_karyawan
     * @param string $kode_barang
     * @return Menjual the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($nip_karyawan, $kode_barang)
    {
        if (($model = Menjual::findOne(['nip_karyawan' => $nip_karyawan, 'kode_barang' => $kode_barang])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
