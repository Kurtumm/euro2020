<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ft\search\Tournament */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tournaments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tournament-index">
    <?php Pjax::begin();?>
    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <div class="card card-default">
        <div class="card-header">
            index
            <p class="pull-right">
                <?= Html::a('Create Tournament', ['create'], ['class' => 'btn btn-success btn-xs']) ?>
            </p>
        </div>
        <div class="card-body">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
        		'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

            		'tournamentId',
            		'status',
            		'type',
            		'title',
            		'startDate',
            		// 'endDate',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
    <?php Pjax::end();?>
</div>
