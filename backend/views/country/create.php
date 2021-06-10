<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ft\Country */

$this->title = 'Create Country';
$this->params['breadcrumbs'][] = ['label' => 'Countries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-create">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
