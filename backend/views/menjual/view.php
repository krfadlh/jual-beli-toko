<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Menjual\Menjual */

$this->title = $model->nip_karyawan;
$this->params['breadcrumbs'][] = ['label' => 'Menjuals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menjual-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'nip_karyawan' => $model->nip_karyawan, 'kode_barang' => $model->kode_barang], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'nip_karyawan' => $model->nip_karyawan, 'kode_barang' => $model->kode_barang], [
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
            'tgl_penjualan',
            'jmlh_barang',
            'nip_karyawan',
            'kode_barang',
            'id_transaksi',
        ],
    ]) ?>

</div>
