<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ft\TournamentRound */

//$this->title = $model->title;
$this->title = 'View Tournament Round: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tournament Rounds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tournament-round-view">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <div class="card card-default">
        <div class="card-header">
            <?= Html::encode($this->title) ?>
            <p class="pull-right">
                <?= Html::a('Update', ['update', 'id' => $model->tournamentRoundId], ['class' => 'btn btn-primary btn-xs']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->tournamentRoundId], [
                    'class' => 'btn btn-danger btn-xs',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
        </div>
        <div class="card-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
					'tournamentRoundId',
					'status',
					'tournamentId',
					'title',
                ],
            ]) ?>
        </div>
    </div>

</div>
