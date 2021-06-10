<?php

namespace frontend\models\ft;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "user_tournament_match".
 *
 * @property int $userId
 * @property int $tournamentMatchId
 * @property int $status
 * @property int $matchResult
 * @property int $homeScore
 * @property int $awayScore
 * @property int|null $userTournamentSpecialCardId
 * @property int $multiplePoint
 * @property int $point
 * @property int $scorePoint
 * @property int $totalPoint
 *
 * @property TournamentMatch $tournamentMatch
 * @property User $user
 * @property UserTournamentSpecialCard $userTournamentSpecialCard
 */
class UserTournamentMatch extends \common\models\ft\UserTournamentMatch
{
    const GUEST_RESULT_HOME_WIN = 1;
    const GUEST_RESULT_DRAW = 2;
    const GUEST_RESULT_AWAY_WIN = 3;

    public $sumPoint;
    public $sumScorePoint;
    public $sumTotalPoint;
    public $countWrongMatchResult;
    public $countCorrectMatchResult;
    public $oneSideScore;
    public $twoSideScore;

    public function getGuessResultArray()
    {
        return [
            self::GUEST_RESULT_HOME_WIN => 'เจ้าบ้านชนะ',
            self::GUEST_RESULT_DRAW => 'เสมอ',
            self::GUEST_RESULT_AWAY_WIN => 'ทีมเยือนชนะ',
        ];
    }

    public function getGuessResultText()
    {
        return $this->getGuessResultArray()[$this->matchResult];
    }

    public function matchTable()
    {
        // countWrongMatchResult
        $countWrongMatchResult = self::find()
            ->select([
                'userId',
                'countWrongMatchResult' => new Expression('count(*)')
            ])
            ->where([
                'point'=>0
            ])
            ->groupBy('userId')
            ->all();
    }
}
