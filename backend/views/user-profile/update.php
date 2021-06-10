<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ft\UserProfile */

$this->title = 'Update User Profile: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'User Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->userProfileId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-profile-update">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
