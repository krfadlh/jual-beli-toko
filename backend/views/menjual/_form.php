<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Barang\Barang;
use common\models\Karyawan\Karyawan;

/* @var $this yii\web\View */
/* @var $model common\models\Menjual\Menjual */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menjual-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tgl_penjualan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jmlh_barang')->textInput() ?>

    <?=
     $form->field($model, 'nip_karyawan')->dropDownList(
        ArrayHelper::map(common\models\Karyawan\Karyawan::find()->all(), 'nip_karyawan', 'nip_karyawan'),
        [
            'prompt' => 'Pilih NIP Karyawan',
            'disabled' => (isset($relAttributes) && isset($relAttributes['nip_karyawan'])),
        ]
     )-> label('NIP Karyawan <span></span>');?>

  <?=
     $form->field($model, 'kode_barang')->dropDownList(
        ArrayHelper::map(common\models\Barang\Barang::find()->all(), 'kode_barang', 'kode_barang'),
        [
            'prompt' => 'Pilih Kode Barang',
            'disabled' => (isset($relAttributes) && isset($relAttributes['kode_barang'])),
        ]
     )-> label('Kode Barang <span></span>');?>

    <?= $form->field($model, 'id_transaksi')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
