<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ft\UserHasTournamentMatch */

$this->title = 'Create User Has Tournament Match';
$this->params['breadcrumbs'][] = ['label' => 'User Has Tournament Matches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-has-tournament-match-create">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
