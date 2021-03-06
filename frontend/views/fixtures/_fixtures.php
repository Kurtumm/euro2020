<?php
$currentDate = '';
?>
<?php foreach ($fixtures as $fixture) : ?>
    <?php
    $fixtureDateTime = explode(' ', $fixture->matchDateTime);
    $date = $fixtureDateTime[0];
    $time = $fixtureDateTime[1];

    $isDisable = date('Y-m-d H:i:s') > $fixture->matchDateTime;

    ?>

    <?php if ($currentDate == ''): ?>
        <h2><?= $date ?></h2>
    <?php endif; ?>
    <?php if ($currentDate != '' && $currentDate != $date): ?>
        <hr>
        <h2 class="mt-2 mt-md-4"><?= $date ?></h2>
    <?php endif; ?>
    <div class="row my-2 border p-2">
        <div class="col-md-1 col-12 mb-md-0 mb-2"><?= substr($time, 0, 5) ?></div>
        <div class="col-md-3 col-5 text-md-end text-center">
            <div class="d-md-block d-none">
                <?= $fixture->homeCountry->name ?> (<?= $fixture->homeCountry->cioc ?>) <img
                    src="<?= $fixture->homeCountry->flag ?>" alt="" height="20">
            </div>
            <div class="d-block d-md-none">
                <img src="<?= $fixture->homeCountry->flag ?>" alt="" height="20"><br>
                <?= $fixture->homeCountry->name ?> <br>
                (<?= $fixture->homeCountry->cioc ?>)
            </div>
        </div>
        <div class="col-md-1 col-2 text-center">
            <?= isset($fixture->homeScore) ? $fixture->homeScore : '-' ?>
            : <?= isset($fixture->awayScore) ? $fixture->awayScore : '-' ?>
        </div>
        <div class="col-md-3 col-5 text-center text-md-start">

            <div class="d-md-block d-none">
                <img src="<?= $fixture->awayCountry->flag ?>" alt="" height="20"> <?= $fixture->awayCountry->name ?>
                (<?= $fixture->awayCountry->cioc ?>)
            </div>
            <div class="d-block d-md-none">
                <img src="<?= $fixture->awayCountry->flag ?>" alt="" height="20"><br>
                <?= $fixture->awayCountry->name ?><br>
                (<?= $fixture->awayCountry->cioc ?>)
            </div>
        </div>

        <div class="col-md-2 col-6 text-center mt-md-0 mt-4">
            <?php if (!$isDisable): ?>
                <a class="btn btn-primary btn-sm"
                   href="/fixtures/guess?id=<?= $fixture->tournamentMatchId ?>">???????????????</a>
            <?php else: ?>
                <button class="btn btn-secondary btn-sm" disabled>???????????????</button>
            <?php endif; ?>

            <?php if ($isDisable): ?>
                <a class="btn btn-info btn-sm"
                   href="/fixtures/user-guess?id=<?= $fixture->tournamentMatchId ?>"><i
                        class="fas fa-search"></i></a>
            <?php endif; ?>

            <?php if (Yii::$app->user->id == 1) : ?>
                <a class="btn btn-info btn-sm"
                   href="/fixtures/update-result?id=<?= $fixture->tournamentMatchId ?>"><i
                        class="fas fa-futbol"></i></a>
            <?php endif; ?>
        </div>
        <div class="col-md-2 col-6 text-center mt-4 mt-md-0">

            <?php
            if (isset($fixture->userTournamentMatch)) {
                echo $fixture->userTournamentMatch->guessResultText . " ({$fixture->userTournamentMatch->homeScore} : {$fixture->userTournamentMatch->awayScore})";
            } else {
                echo '?????????????????????';
            }
            ?>
        </div>
    </div>

    <?php
    $currentDate = $date;
    ?>
<?php endforeach; ?>