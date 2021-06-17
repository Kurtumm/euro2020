<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Euro 2020</h1>
    </div>

    <hr>

    <div class="body-content">
        <div class="row">
            <div class="col-md-12 mb-4">
                <?php if ($fixtures !== []): ?>
                    <h3 class="text-center mb-2 mb-md-4">Match แข่งวันนี้</h3>
                    <div>
                        <?= $this->render('../fixtures/_fixtures', compact('fixtures')) ?>
                    </div>
                <?php endif; ?>
                <hr>
            </div>
            <div class="col-md-4">
                <h3 class="text-center mb-2 mb-md-4">ตารางคะแนนทายผล</h3>

                <table class="table table-bordered table-striped table-condensed" style="font-size: 0.8em;">
                    <tr class="text-center">
                        <th>#</th>
                        <th>User</th>
                        <th>
                            ทายผล<br>
                            (ถูก-ผิด)
                        </th>
                        <th>
                            ทายสกอร์<br>
                            (ถูก2-ถูก1-ผิด)
                        </th>
                        <th>P</th>
                    </tr>
                    <?php foreach ($userTable as $k => $item): ?>
                        <tr class="text-center">
                            <td><?= $k + 1 ?></td>
                            <td><?= $item['username'] ?></td>
                            <td><?= isset($item['countCorrectMatchResult']) ? $item['countCorrectMatchResult'] : 0 ?>-<?= isset($item['countWrongMatchResult']) ? $item['countWrongMatchResult'] : 0 ?></td>
                            <td><?= isset($item['twoSideScore']) ? $item['twoSideScore'] : 0 ?>-<?= isset($item['oneSideScore']) ? $item['oneSideScore'] : 0 ?>-<?= isset($item['wrongScore']) ? $item['wrongScore'] : 0 ?></td>
                            <td><?= isset($item['sumTotalPoint']) ? $item['sumTotalPoint'] : 0 ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>

                <h3 class="text-center mb-2 mb-md-4">เดาแชมป์</h3>

                <table class="table table-bordered table-striped table-condensed" style="font-size: 0.8em;">
                    <tr class="text-center">
                        <th>#</th>
                        <th>User</th>
                        <th>Country</th>
                    </tr>
                    <?php foreach ($guessChamps as $k => $guessChamp): ?>
                        <tr class="text-center">
                            <td><?= $k + 1 ?></td>
                            <td><?= $guessChamp->user->username ?></td>
                            <td><img src="<?=$guessChamp->country->flag?>" alt="" height="20">&nbsp;<?=$guessChamp->country->name?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="col-md-8">
                <h3 class="text-center mb-2 mb-md-4">ตารางคะแนนรอบแบ่งกลุ่ม</h3>
                <div class="row" style="font-size: 0.7em;">
                    <?php foreach ($tournament->tournamentGroups as $tournamentGroup) : ?>
                        <div class="col-12 col-md-6 mb-2 mb-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <?= $tournamentGroup->title ?>
                                </div>
                                <table class="table table-bordered table-striped table-condensed mb-0">
                                    <tr>
                                        <th>Country</th>
                                        <th>W</th>
                                        <th>D</th>
                                        <th>L</th>
                                        <th>GF</th>
                                        <th>GA</th>
                                        <th>GD</th>
                                        <th>P</th>
                                    </tr>
                                    <?php foreach ($tournamentGroup->tournamentGroupTables as $tournamentGroupTable) : ?>
                                        <tr>
                                            <td>
                                                <img src="<?= $tournamentGroupTable->country->flag ?>" alt="" height="10">&nbsp;<?= $tournamentGroupTable->country->name ?>
                                            </td>
                                            <td class="text-center"><?= $tournamentGroupTable->won ?></td>
                                            <td class="text-center"><?= $tournamentGroupTable->draw ?></td>
                                            <td class="text-center"><?= $tournamentGroupTable->lost ?></td>
                                            <td class="text-center"><?= $tournamentGroupTable->gf ?></td>
                                            <td class="text-center"><?= $tournamentGroupTable->ga ?></td>
                                            <td class="text-center"><?= $tournamentGroupTable->gd ?></td>
                                            <td class="text-center"><?= $tournamentGroupTable->point ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>
</div>
