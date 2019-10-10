<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Menjual\MenjualSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menjual-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tgl_penjualan') ?>

    <?= $form->field($model, 'jmlh_barang') ?>

    <?= $form->field($model, 'nip_karyawan') ?>

    <?= $form->field($model, 'kode_barang') ?>

    <?= $form->field($model, 'id_transaksi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
