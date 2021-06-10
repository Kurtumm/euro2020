<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ft\Country */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="country-form">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
        'fieldConfig' => [
            'template' => '{label}<div class="col-sm-10">{input}</div>',
            'labelOptions'=> [
                'class'=>'col-sm-2 control-label'
            ]
        ]
    ]) ?>

    <div class="card card-default">
        <div class="card-header">Form</div>
        <div class="card-body">

			<?= $form->field($model, 'status',['options'=>['class'=>'row form-group']])->checkbox([], false)->label('status') ?>
			<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'alpha2Code')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'alpha3Code')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'demonym')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'nativeName')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'flag')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'cioc')->textInput(['maxlength' => true]) ?>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
