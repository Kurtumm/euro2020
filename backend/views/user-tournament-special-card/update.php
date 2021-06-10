<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ft\UserTournamentSpecialCard */

$this->title = 'Update User Tournament Special Card: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Tournament Special Cards', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-tournament-special-card-update">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
