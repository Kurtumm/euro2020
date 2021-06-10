<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ft\TournamentGroupTable */

$this->title = 'Create Tournament Group Table';
$this->params['breadcrumbs'][] = ['label' => 'Tournament Group Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tournament-group-table-create">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
