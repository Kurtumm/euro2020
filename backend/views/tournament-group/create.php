<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ft\TournamentGroup */

$this->title = 'Create Tournament Group';
$this->params['breadcrumbs'][] = ['label' => 'Tournament Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tournament-group-create">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
