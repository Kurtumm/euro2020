<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ft\TournamentMatch */

$this->title = 'Update Tournament Match: ' . ' ' . $model->tournamentMatchId;
$this->params['breadcrumbs'][] = ['label' => 'Tournament Matches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tournamentMatchId, 'url' => ['view', 'id' => $model->tournamentMatchId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tournament-match-update">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
