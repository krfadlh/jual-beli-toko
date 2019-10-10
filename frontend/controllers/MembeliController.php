<?php

namespace frontend\controllers;

use Yii;
use common\models\Membeli\Membeli;
use common\models\Membeli\MembeliSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MembeliController implements the CRUD actions for Membeli model.
 */
class MembeliController extends Controller
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
     * Lists all Membeli models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MembeliSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Membeli model.
     * @param string $kode_barang
     * @param string $id_pembeli
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($kode_barang, $id_pembeli)
    {
        return $this->render('view', [
            'model' => $this->findModel($kode_barang, $id_pembeli),
        ]);
    }

    /**
     * Creates a new Membeli model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Membeli();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kode_barang' => $model->kode_barang, 'id_pembeli' => $model->id_pembeli]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Membeli model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $kode_barang
     * @param string $id_pembeli
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($kode_barang, $id_pembeli)
    {
        $model = $this->findModel($kode_barang, $id_pembeli);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kode_barang' => $model->kode_barang, 'id_pembeli' => $model->id_pembeli]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Membeli model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $kode_barang
     * @param string $id_pembeli
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($kode_barang, $id_pembeli)
    {
        $this->findModel($kode_barang, $id_pembeli)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Membeli model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $kode_barang
     * @param string $id_pembeli
     * @return Membeli the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($kode_barang, $id_pembeli)
    {
        if (($model = Membeli::findOne(['kode_barang' => $kode_barang, 'id_pembeli' => $id_pembeli])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
