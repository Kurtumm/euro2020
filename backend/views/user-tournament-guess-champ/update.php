<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ft\UserTournamentGuessChamp */

$this->title = 'Update User Tournament Guess Champ: ' . ' ' . $model->userId;
$this->params['breadcrumbs'][] = ['label' => 'User Tournament Guess Champs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->userId, 'url' => ['view', 'userId' => $model->userId, 'tournamentId' => $model->tournamentId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-tournament-guess-champ-update">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
