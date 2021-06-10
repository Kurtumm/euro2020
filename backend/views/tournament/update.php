<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ft\Tournament */

$this->title = 'Update Tournament: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tournaments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->tournamentId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tournament-update">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
