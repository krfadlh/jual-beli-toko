<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Menjual\Menjual */

$this->title = 'Update Menjual: ' . $model->nip_karyawan;
$this->params['breadcrumbs'][] = ['label' => 'Menjuals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nip_karyawan, 'url' => ['view', 'nip_karyawan' => $model->nip_karyawan, 'kode_barang' => $model->kode_barang]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="menjual-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
