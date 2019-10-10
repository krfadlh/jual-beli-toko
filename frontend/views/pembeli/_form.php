<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Pembeli\Pembeli */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembeli-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pembeli')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_pembeli')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_telp')->textInput() ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
