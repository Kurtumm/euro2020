<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Euro 2020</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <?php foreach ($tournament->tournamentGroups as $tournamentGroup) :?>
            <div class="col-lg-6 mb-2 mb-md-4">
                <div class="card">
                    <div class="card-header">
                        <?=$tournamentGroup->title?>
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
                            <?php foreach ($tournamentGroup->tournamentGroupTables as $tournamentGroupTable) :?>
                            <tr>
                                <td><?=$tournamentGroupTable->country->name?></td>
                                <td class="text-center"><?=$tournamentGroupTable->won?></td>
                                <td class="text-center"><?=$tournamentGroupTable->draw?></td>
                                <td class="text-center"><?=$tournamentGroupTable->lost?></td>
                                <td class="text-center"><?=$tournamentGroupTable->gf?></td>
                                <td class="text-center"><?=$tournamentGroupTable->ga?></td>
                                <td class="text-center"><?=$tournamentGroupTable->gd?></td>
                                <td class="text-center"><?=$tournamentGroupTable->point?></td>
                            </tr>
                            <?php endforeach;?>
                        </table>
                </div>
            </div>
            <?php endforeach;?>
        </div>

    </div>
</div>
