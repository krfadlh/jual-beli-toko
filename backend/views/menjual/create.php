<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Menjual\Menjual */

$this->title = 'Create Menjual';
$this->params['breadcrumbs'][] = ['label' => 'Menjuals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menjual-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
