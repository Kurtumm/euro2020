<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ft\SpecialCard */

//$this->title = $model->title;
$this->title = 'View Special Card: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Special Cards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="special-card-view">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <div class="card card-default">
        <div class="card-header">
            <?= Html::encode($this->title) ?>
            <p class="pull-right">
                <?= Html::a('Update', ['update', 'id' => $model->specialCardId], ['class' => 'btn btn-primary btn-xs']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->specialCardId], [
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
					'specialCardId',
					'status',
					'title',
					'multiple',
                ],
            ]) ?>
        </div>
    </div>

</div>
