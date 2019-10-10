<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\Menjual\MenjualSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menjuals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menjual-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Menjual', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tgl_penjualan',
            'jmlh_barang',
            'nip_karyawan',
            'kode_barang',
            'id_transaksi',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
