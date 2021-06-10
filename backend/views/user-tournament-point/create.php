<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ft\UserTournamentPoint */

$this->title = 'Create User Tournament Point';
$this->params['breadcrumbs'][] = ['label' => 'User Tournament Points', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-tournament-point-create">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
