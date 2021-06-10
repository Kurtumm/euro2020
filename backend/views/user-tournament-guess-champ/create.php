<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ft\UserTournamentGuessChamp */

$this->title = 'Create User Tournament Guess Champ';
$this->params['breadcrumbs'][] = ['label' => 'User Tournament Guess Champs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-tournament-guess-champ-create">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
