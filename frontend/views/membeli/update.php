<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Membeli\Membeli */

$this->title = 'Update Membeli: ' . $model->kode_barang;
$this->params['breadcrumbs'][] = ['label' => 'Membelis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_barang, 'url' => ['view', 'kode_barang' => $model->kode_barang, 'id_pembeli' => $model->id_pembeli]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="membeli-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
