<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ft\Tournament */

//$this->title = $model->title;
$this->title = 'View Tournament: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tournaments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tournament-view">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <div class="card card-default">
        <div class="card-header">
            <?= Html::encode($this->title) ?>
            <p class="pull-right">
                <?= Html::a('Update', ['update', 'id' => $model->tournamentId], ['class' => 'btn btn-primary btn-xs']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->tournamentId], [
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
					'tournamentId',
					'status',
					'type',
					'title',
					'startDate',
					'endDate',
                ],
            ]) ?>
        </div>
    </div>

</div>
