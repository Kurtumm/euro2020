<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace console\controllers;

use common\models\ft\TournamentGroupTable;
use frontend\models\ft\Tournament;
use frontend\models\ft\TournamentMatch;
use yii\console\Controller;
use Yii;

/**
 * Description of LandingController
 *
 * @author cozxy
 */
class DataController extends Controller
{
    public function actionGenerateMatch()
    {
        $tournament = Tournament::find()
            ->joinWith([
                'tournamentGroups' => function($q) {
                    $q->joinWith([
                        'tournamentGroupTables' => function($q) {
                            $q->joinWith([
                                'country'
                            ]);
                        }
                    ]);
                }
            ])
            ->where([
                'tournament.tournamentId' => 1
            ])
            ->one();
            $i = 1;
        foreach ($tournament->tournamentGroups as $tournamentGroup) {
            $tournamentGroupTables = $tournamentGroup->tournamentGroupTables;


            while(sizeof($tournamentGroupTables) > 1) {
                $firstTeam = $tournamentGroupTables[0];
                array_shift($tournamentGroupTables);

                foreach ($tournamentGroupTables as $team) {
                    echo $firstTeam->country->name . ' : '.$team->country->name . "\n";

                    $model = new TournamentMatch();
                    $model->homeCountryId = $firstTeam->countryId;
                    $model->awayContryId = $team->countryId;
                    $model->tournamentGroupId = $team->tournamentGroupId;
                    $model->tournamentRoundId = 1;
                    $model->title = "{$i}";
                    $model->matchDateTime = '2021-06-12 02:00:00';

                    if(!$model->save()) {
                        print_r($model->errors);
                    }

                    $i++;
                }
            }
        }
    }

    public function actionRandomMatchResult()
    {
        $tournamentMatches = TournamentMatch::find()->all();

        foreach ($tournamentMatches as $tournamentMatch) {
            $matchResult = rand(1, 3);

            $homeScore = 0;
            $awayScore = 0;

            if($matchResult == 1) {
                //home win : homeScore > awayScore
                $homeScore = rand(1,5);
                $awayScore = rand(0, $homeScore-1);
            } else if($matchResult == 2) {
                // draw : homeScore = awayScore
                $homeScore = $awayScore = rand(0,5);
            } else {
                // away win : homeScore < awayScore
                $awayScore = rand(1,5);
                $homeScore = rand(0, $awayScore-1);
            }

            $tournamentMatch->homeScore = $homeScore;
            $tournamentMatch->awayScore = $awayScore;
            $tournamentMatch->matchResult = $matchResult;
            if(!$tournamentMatch->save()) {
                print_r($tournamentMatch->errors);
            } else {
                echo $matchResult . ' : ' . $homeScore . ' : ' . $awayScore. "\n";
            }
        }
    }

    public function actionResetMatchResult()
    {
        TournamentMatch::updateAll(['matchResult' =>null, 'homeScore' => null, 'awayScore'=>null]);
    }

    public function actionCalculateTournamentGroupTable()
    {
        $tournamentGroupTables = TournamentGroupTable::find()->all();

        foreach ($tournamentGroupTables as $tournamentGroupTable) {

        }
    }

    public function actionResetTournamentGroupTable()
    {
        TournamentGroupTable::updateAll([
            'won' => 0,
            'draw' => 0,
            'lost' => 0,
            'gf' => 0,
            'ga' => 0,
            'gd' => 0,
            'point' => 0,
        ]);
    }
}
