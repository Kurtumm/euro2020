<?php

use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'Euro 2020 : ทายผล';
?>
<div class="site-index">

    <div class="jumbotron mb-2 mb-md-4">
        <h1><?= $this->title ?></h1>
    </div>

    <?php
    $isDisable = date('Y-m-d H:i:s') > '2021-06-12 02:00:00';
    ?>

    <?php if ($isDisable): ?>
        <div class="alert alert-danger text-center font-weight-bold">
            หมดเวลาทายผล
        </div>
    <?php endif; ?>

    <div class="body-content mt-5">
        <?php $form = ActiveForm::begin([
            'id' => 'guess-form'
        ]) ?>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card card-default">
                    <div class="card-header">
                        <h3>ทายผลการแข่งขัน</h3>
                    </div>
                    <div class="card-body">
                        <?= $form->field($userTournamentGuessChamp, 'countryId')->dropDownList(\yii\helpers\ArrayHelper::map($tournamentGroupTables, 'countryId', 'country.name'), ['prompt' => 'เลือกทีม', 'disabled' => $isDisable])->label(false) ?>
                    </div>
                    <div class="card-footer d-grid">
                        <button class="btn btn-primary" type="submit">ทายผลทีมแชมป์</button>
                    </div>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
