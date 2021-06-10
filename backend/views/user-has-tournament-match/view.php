<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ft\UserHasTournamentMatch */

//$this->title = $model->userId;
$this->title = 'View User Has Tournament Match: ' . ' ' . $model->userId;
$this->params['breadcrumbs'][] = ['label' => 'User Has Tournament Matches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-has-tournament-match-view">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <div class="card card-default">
        <div class="card-header">
            <?= Html::encode($this->title) ?>
            <p class="pull-right">
                <?= Html::a('Update', ['update', 'userId' => $model->userId, 'tournamentMatchId' => $model->tournamentMatchId], ['class' => 'btn btn-primary btn-xs']) ?>
                <?= Html::a('Delete', ['delete', 'userId' => $model->userId, 'tournamentMatchId' => $model->tournamentMatchId], [
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
					'userId',
					'tournamentMatchId',
					'status',
					'homeScore',
					'awayScore',
					'multiplePoint',
					'guessResult',
					'point',
					'scorePoint',
					'totalPoint',
                ],
            ]) ?>
        </div>
    </div>

</div>
