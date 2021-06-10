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
    ?>

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
        <table class="table table-striped table-bordered">
            <tr>
                <th>User</th>
                <th>ทายผล</th>
                <th>ทายสกอร์ (เจ้าบ้าน : ทีมเยือน)</th>
                <th>ผลการทาย</th>
            </tr>
            <?php foreach ($tournamentMatch->userTournamentMatches as $userTournamentMatch) :?>
            <tr>
                <td><?=$userTournamentMatch->user->username?></td>
                <td><?=$userTournamentMatch->guessResultText?></td>
                <td><?=$userTournamentMatch->homeScore?> : <?=$userTournamentMatch->awayScore?></td>
                <td></td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>
