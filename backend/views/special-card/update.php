<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ft\SpecialCard */

$this->title = 'Update Special Card: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Special Cards', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->specialCardId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="special-card-update">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
