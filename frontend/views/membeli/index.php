<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\Membeli\MembeliSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Membeli';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="membeli-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Membeli', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tgl_pembelian',
            'jmlh_barang',
            'harga_yg_dibayar',
            'kode_barang',
            'id_pembeli',
            //'id_transaksi',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
