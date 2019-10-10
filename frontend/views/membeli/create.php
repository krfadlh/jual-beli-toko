<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Membeli\Membeli */

$this->title = 'Create Membeli';
$this->params['breadcrumbs'][] = ['label' => 'Membelis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="membeli-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
