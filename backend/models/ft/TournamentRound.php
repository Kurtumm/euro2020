<?php

namespace backend\models\ft;

use Yii;
use \common\models\ft\TournamentRound as TournamentRoundModel;
use \backend\models\ft\query\TournamentRoundQuery;
/**
* This is the model class for table "tournament_round".
*
* @property string $tournamentRoundId
* @property integer $status
* @property string $tournamentId
* @property string $title
*
* @property TournamentMatch[] $tournamentMatches1
* @property Tournament $tournament
*/

class TournamentRound extends TournamentRoundModel
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
    * @return \backend\models\ft\query\TournamentRoundQuery the active query used by this AR class.
    */
    public static function find()
    {
        return new TournamentRoundQuery(get_called_class());
    }
}
