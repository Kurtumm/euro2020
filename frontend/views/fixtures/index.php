<?php

/* @var $this yii\web\View */

$this->title = 'Euro 2020 : Fixtures';
?>
<div class="site-index">


    <div class="jumbotron">
        <h1>
            ทายทีมแชมป์<br>
        </h1>
        <?php if (date('Y-m-d H:i:s') < '2021b06-12 02:00:00'): ?>
            <div class="alert alert-warning">ทายได้ถึงเริ่มการแข่งขันคู่แรก</div>
        <?php endif; ?>
    </div>

    <div class="body-content">
        <div class="row justify-content-center">
            <div class="col-md-3 text-center">
                <h3><?= isset($userTournamentGuessChamp) ? "<img src='{$userTournamentGuessChamp->country->flag}' class='img-fluid' height='20'>" . $userTournamentGuessChamp->country->name : '-' ?></h3>

                <?php if (date('Y-m-d H:i:s') < '2021-06-12 02:00:00'): ?>
                    <a href="/fixtures/guess-champ" class="btn btn-warning btn-lg">ทายทีมแชมป์</a>
                <?php endif; ?>
            </div>

        </div>
    </div>

    <hr class="my-5">

    <div class="jumbotron">
        <h1><?= $this->title ?></h1>
    </div>

    <div class="body-content">
        <?=$this->render('_fixtures', compact('fixtures'))?>
    </div>
</div>
