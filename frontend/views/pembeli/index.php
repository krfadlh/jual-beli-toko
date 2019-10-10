<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\Pembeli\PembeliSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pembeli';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembeli-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pembeli', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pembeli',
            'nama_pembeli',
            'no_telp',
            'alamat',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
