<?php
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'Euro 2020 : ทายผล';
?>
<div class="site-index">

    <div class="jumbotron mb-2 mb-md-4">
        <h1><?=$this->title?></h1>
    </div>

    <?php
    $fixtureDateTime = explode(' ', $tournamentMatch->matchDateTime);
    $date = $fixtureDateTime[0];
    $time = $fixtureDateTime[1];

    $isDisable = date('Y-m-d H:i:s') > $tournamentMatch->matchDateTime;
    ?>

    <?php if($isDisable):?>
    <div class="alert alert-danger text-center font-weight-bold">
        หมดเวลาทายผล
    </div>
    <?php endif;?>

    <div class="row my-2 border p-2">
        <div class="col-md-2"><?=$tournamentMatch->matchDateTime?></div>
        <div class="col-md-4 text-end">
            <?=$tournamentMatch->homeCountry->name?> (<?=$tournamentMatch->homeCountry->cioc?>) <img src="<?=$tournamentMatch->homeCountry->flag?>" alt="" height="20">
        </div>
        <div class="col-md-1 text-center">
            <?=isset($tournamentMatch->homeScore) ? $tournamentMatch->homeScore : '-'?> : <?=isset($tournamentMatch->awayScore) ? $tournamentMatch->awayScore : '-'?>
        </div>
        <div class="col-md-4 text-start">
            <img src="<?=$tournamentMatch->awayCountry->flag?>" alt="" height="20"> <?=$tournamentMatch->awayCountry->name?> (<?=$tournamentMatch->awayCountry->cioc?>)
        </div>
    </div>

    <div class="body-content mt-5">
        <?php $form = ActiveForm::begin([
                'id'=>'guess-form'
        ])?>
        <div class="row">
            <div class="col-md-4">
                <div class="card card-default">
                    <div class="card-header">
                        <h3>ทายผลการแข่งขัน</h3>
                    </div>
                    <div class="card-body">
                        <?=$form->field($tournamentMatch, 'matchResult')->dropDownList($tournamentMatch->guessResultArray, ['prompt' => 'เลือกผลการแข่งขัน'])->label(false)?>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        <h3>ทายสกอร์</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 text-end">
                                <?=$tournamentMatch->homeCountry->name?> (<?=$tournamentMatch->homeCountry->cioc?>) <img src="<?=$tournamentMatch->homeCountry->flag?>" alt="" height="20">
                            </div>
                            <div class="col-md-2">
                                <?=$form->field($tournamentMatch, 'homeScore', ['errorOptions' => ['tag' => null]])->textInput()->label(false)?>
                            </div>
                            <div class="col-md-1 text-center">:</div>
                            <div class="col-md-2">
                                <?=$form->field($tournamentMatch, 'awayScore', ['errorOptions' => ['tag' => null]])->textInput()->label(false)?>
                            </div>
                            <div class="col-md-3">
                                <img src="<?=$tournamentMatch->awayCountry->flag?>" alt="" height="20"> <?=$tournamentMatch->awayCountry->name?> (<?=$tournamentMatch->awayCountry->cioc?>)
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="form-group mt-3 mt-md-5">
            <button class="btn btn-primary" type="submit">Update ผลการแข่งขัน และคำนวณคะแนน</button>
        </div>
        <?php ActiveForm::end();?>
    </div>
</div>
