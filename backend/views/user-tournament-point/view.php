<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ft\UserTournamentPoint */

//$this->title = $model->userId;
$this->title = 'View User Tournament Point: ' . ' ' . $model->userId;
$this->params['breadcrumbs'][] = ['label' => 'User Tournament Points', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-tournament-point-view">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <div class="card card-default">
        <div class="card-header">
            <?= Html::encode($this->title) ?>
            <p class="pull-right">
                <?= Html::a('Update', ['update', 'userId' => $model->userId, 'tournamentId' => $model->tournamentId], ['class' => 'btn btn-primary btn-xs']) ?>
                <?= Html::a('Delete', ['delete', 'userId' => $model->userId, 'tournamentId' => $model->tournamentId], [
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
					'tournamentId',
					'point',
                ],
            ]) ?>
        </div>
    </div>

</div>
