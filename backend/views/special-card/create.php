<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ft\SpecialCard */

$this->title = 'Create Special Card';
$this->params['breadcrumbs'][] = ['label' => 'Special Cards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="special-card-create">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
