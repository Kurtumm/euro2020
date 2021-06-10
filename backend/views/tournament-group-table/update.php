<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ft\TournamentGroupTable */

$this->title = 'Update Tournament Group Table: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tournament Group Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->tournamentGroupTableId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tournament-group-table-update">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
