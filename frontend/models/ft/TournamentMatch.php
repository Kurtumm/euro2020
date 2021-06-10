<?php

namespace frontend\models\ft;

use Yii;

/**
 * This is the model class for table "tournament_match".
 *
 * @property int $tournamentMatchId
 * @property int $status
 * @property int $tournamentGroupId
 * @property int $tournamentRoundId
 * @property int $homeCountryId
 * @property int|null $homeScore
 * @property int $awayContryId
 * @property int|null $awayScore
 * @property int|null $matchResult
 * @property string $matchDateTime
 *
 * @property Country $homeCountry
 * @property Country $awayContry
 * @property TournamentGroup $tournamentGroup
 * @property TournamentRound $tournamentRound
 * @property UserTournamentMatch[] $userTournamentMatches
 * @property User[] $users
 */
class TournamentMatch extends \common\models\ft\TournamentMatch
{
    public function getUserTournamentMatch()
    {
        return $this->hasOne(UserTournamentMatch::className(), ['tournamentMatchId' => 'tournamentMatchId']);
    }

    public static function calculateTable()
    {
        $tables = self::find()
            ->where(['is not', 'homeScore', null])
            ->all();

        $data = [];

        foreach ($tables as $table) {
            $draw = 0;
            $rPoint = [];

            switch ($table->matchResult) {
                case 1:
                    $rPoint = [3,0];
                    $hResult = [1, 0];
                    $aResult = [0, 1];
                    break;
                case 2:
                    $draw = 1;
                    $rPoint = [1,1];
                    $hResult = [0, 0];
                    $aResult = [0, 0];
                    break;
                case 3:
                    $rPoint = [0,3];
                    $hResult = [0, 1];
                    $aResult = [1, 0];
                    break;
            }

            $countryIds = [$table->homeCountryId, $table->awayCountryId];
            $homeGoal = [$table->homeScore, $table->awayScore];
            $awayGoal = [$table->awayScore, $table->homeScore];

            foreach ($countryIds as $k => $countryId) {
                if (!isset($data[$countryId])) {
                    $won = ($k == 0) ? $hResult[0] : $aResult[0];
                    $rdraw = $draw;
                    $lost = ($k == 0) ? $hResult[1] : $aResult[1];
                    $gf = ($k == 0) ? $homeGoal[0] : $awayGoal[0];
                    $ga = ($k == 0) ?  $homeGoal[1] :  $awayGoal[1];
                    $gd = $gf - $ga;
                    $point = $rPoint[$k];
                } else {
                    $d = $data[$countryId];
                    $won = ($k == 0) ? $d['won'] + $hResult[0] : $d['won'] + $aResult[0];
                    $rdraw = $d['draw'] + $draw;
                    $lost = ($k == 0) ? $d['lost'] + $hResult[1] : $d['lost'] + $aResult[1];
                    $gf = ($k == 0) ? $d['gf'] + $homeGoal[0] : $d['gf'] + $awayGoal[0];
                    $ga = ($k == 0) ? $d['ga'] + $homeGoal[1] : $d['ga'] + $awayGoal[1];
                    $gd = $gf - $ga;
                    $point = $d['point'] + $rPoint[$k];
                }
                $data[$countryId] = [
                    'won' => $won,
                    'draw' => $rdraw,
                    'lost' => $lost,
                    'ga' => $ga,
                    'gf' => $gf,
                    'gd' => $gd,
                    'point' => $point,
                ];
            }
        }
        return $data;
    }
}
