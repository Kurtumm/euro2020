<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ft\Country */

//$this->title = $model->name;
$this->title = 'View Country: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Countries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-view">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <div class="card card-default">
        <div class="card-header">
            <?= Html::encode($this->title) ?>
            <p class="pull-right">
                <?= Html::a('Update', ['update', 'id' => $model->countryId], ['class' => 'btn btn-primary btn-xs']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->countryId], [
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
					'countryId',
					'status',
					'name',
					'alpha2Code',
					'alpha3Code',
					'demonym',
					'nativeName',
					'flag',
					'cioc',
                ],
            ]) ?>
        </div>
    </div>

</div>
