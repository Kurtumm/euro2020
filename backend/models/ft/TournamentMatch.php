<?php

namespace backend\models\ft;

use Yii;
use \common\models\ft\TournamentMatch as TournamentMatchModel;
use \backend\models\ft\query\TournamentMatchQuery;
/**
* This is the model class for table "tournament_match".
*
* @property string $tournamentMatchId
* @property integer $status
* @property integer $homeCountryId
* @property integer $homeScore
* @property integer $awayCountryId
* @property integer $awayScore
* @property integer $matchResult
* @property string $matchDateTime
* @property string $tournamentGroupId
* @property string $tournamentRoundId
* @property string $tournamentGroupTableId
*
* @property Country $homeCountry
* @property Country $awayCountry
* @property TournamentRound $tournamentRound
* @property TournamentGroup $tournamentGroup
* @property TournamentGroupTable $tournamentGroupTable
* @property UserHasTournamentMatch[] $userHasTournamentMatches
* @property User[] $users
*/

class TournamentMatch extends TournamentMatchModel
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
    * @return \backend\models\ft\query\TournamentMatchQuery the active query used by this AR class.
    */
    public static function find()
    {
        return new TournamentMatchQuery(get_called_class());
    }
}
