<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ft\TournamentRound */

$this->title = 'Create Tournament Round';
$this->params['breadcrumbs'][] = ['label' => 'Tournament Rounds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tournament-round-create">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
