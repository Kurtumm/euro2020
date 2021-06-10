<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ft\TournamentMatch */

//$this->title = $model->tournamentMatchId;
$this->title = 'View Tournament Match: ' . ' ' . $model->tournamentMatchId;
$this->params['breadcrumbs'][] = ['label' => 'Tournament Matches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tournament-match-view">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <div class="card card-default">
        <div class="card-header">
            <?= Html::encode($this->title) ?>
            <p class="pull-right">
                <?= Html::a('Update', ['update', 'id' => $model->tournamentMatchId], ['class' => 'btn btn-primary btn-xs']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->tournamentMatchId], [
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
					'tournamentMatchId',
					'status',
					'homeCountryId',
					'homeScore',
					'awayCountryId',
					'awayScore',
					'matchResult',
					'matchDateTime',
					'tournamentGroupId',
					'tournamentRoundId',
					'tournamentGroupTableId',
                ],
            ]) ?>
        </div>
    </div>

</div>
