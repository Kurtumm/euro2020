<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ft\TournamentGroup */

$this->title = 'Update Tournament Group: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tournament Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->tournamentGroupId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tournament-group-update">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
