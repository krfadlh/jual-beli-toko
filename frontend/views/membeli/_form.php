<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Barang\Barang;
use common\models\Pembeli\Pembeli;

/* @var $this yii\web\View */
/* @var $model common\models\Membeli\Membeli */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="membeli-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tgl_pembelian')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jmlh_barang')->textInput() ?>

    <?= $form->field($model, 'harga_yg_dibayar')->textInput(['maxlength' => true]) ?>


    <?=
     $form->field($model, 'kode_barang')->dropDownList(
        ArrayHelper::map(common\models\Barang\Barang::find()->all(), 'kode_barang', 'kode_barang'),
        [
            'prompt' => 'Pilih Kode Barang',
            'disabled' => (isset($relAttributes) && isset($relAttributes['kode_barang'])),
        ]
     )-> label('Kode Barang <span></span>');?>


    <?=
     $form->field($model, 'id_pembeli')->dropDownList(
        ArrayHelper::map(common\models\Pembeli\Pembeli::find()->all(), 'id_pembeli', 'id_pembeli'),
        [
            'prompt' => 'Pilih ID Pembeli',
            'disabled' => (isset($relAttributes) && isset($relAttributes['id_pembeli'])),
        ]
     )-> label('ID Pembeli <span></span>');?>


    <?= $form->field($model, 'id_transaksi')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
