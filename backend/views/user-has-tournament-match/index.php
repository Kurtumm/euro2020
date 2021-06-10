<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ft\search\UserHasTournamentMatch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Has Tournament Matches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-has-tournament-match-index">
    <?php Pjax::begin();?>
    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <div class="card card-default">
        <div class="card-header">
            index
            <p class="pull-right">
                <?= Html::a('Create User Has Tournament Match', ['create'], ['class' => 'btn btn-success btn-xs']) ?>
            </p>
        </div>
        <div class="card-body">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
        		'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

            		'userId',
            		'tournamentMatchId',
            		'status',
            		'homeScore',
            		'awayScore',
            		// 'multiplePoint',
            		// 'guessResult',
            		// 'point',
            		// 'scorePoint',
            		// 'totalPoint',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
    <?php Pjax::end();?>
</div>
