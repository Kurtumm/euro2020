<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ft\UserTournamentSpecialCard */

//$this->title = $model->id;
$this->title = 'View User Tournament Special Card: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Tournament Special Cards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-tournament-special-card-view">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <div class="card card-default">
        <div class="card-header">
            <?= Html::encode($this->title) ?>
            <p class="pull-right">
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-xs']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
					'id',
					'status',
					'userId',
					'tournamentId',
					'specialCardId',
					'multiple',
					'qouta',
					'used',
                ],
            ]) ?>
        </div>
    </div>

</div>
