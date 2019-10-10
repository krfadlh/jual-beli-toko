<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Membeli\Membeli */

$this->title = $model->kode_barang;
$this->params['breadcrumbs'][] = ['label' => 'Membelis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="membeli-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'kode_barang' => $model->kode_barang, 'id_pembeli' => $model->id_pembeli], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'kode_barang' => $model->kode_barang, 'id_pembeli' => $model->id_pembeli], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'tgl_pembelian',
            'jmlh_barang',
            'harga_yg_dibayar',
            'kode_barang',
            'id_pembeli',
            'id_transaksi',
        ],
    ]) ?>

</div>
