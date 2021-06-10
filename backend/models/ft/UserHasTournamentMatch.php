<?php

namespace backend\models\ft;

use Yii;
use \common\models\ft\UserHasTournamentMatch as UserHasTournamentMatchModel;
use \backend\models\ft\query\UserHasTournamentMatchQuery;
/**
* This is the model class for table "user_has_tournament_match".
*
* @property integer $userId
* @property string $tournamentMatchId
* @property integer $status
* @property integer $homeScore
* @property integer $awayScore
* @property integer $multiplePoint
* @property integer $guessResult
* @property integer $point
* @property integer $scorePoint
* @property integer $totalPoint
*
* @property TournamentMatch $tournamentMatch
* @property User $user
*/

class UserHasTournamentMatch extends UserHasTournamentMatchModel
{
    /**
    * @inheritdoc
    */
    public function rules()
    {
        return array_merge(parent::rules(), []);
    }

    /**
    * @inheritdoc
    */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), []);
    }

    /**
    * @inheritdoc
    * @return \backend\models\ft\query\UserHasTournamentMatchQuery the active query used by this AR class.
    */
    public static function find()
    {
        return new UserHasTournamentMatchQuery(get_called_class());
    }
}
