<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ft\UserHasTournamentMatch */

$this->title = 'Update User Has Tournament Match: ' . ' ' . $model->userId;
$this->params['breadcrumbs'][] = ['label' => 'User Has Tournament Matches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->userId, 'url' => ['view', 'userId' => $model->userId, 'tournamentMatchId' => $model->tournamentMatchId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-has-tournament-match-update">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
