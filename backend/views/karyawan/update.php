<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Karyawan\Karyawan */

$this->title = 'Update Karyawan: ' . $model->nip_karyawan;
$this->params['breadcrumbs'][] = ['label' => 'Karyawans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nip_karyawan, 'url' => ['view', 'id' => $model->nip_karyawan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="karyawan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
