<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ft\TournamentRound */

$this->title = 'Update Tournament Round: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tournament Rounds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->tournamentRoundId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tournament-round-update">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
