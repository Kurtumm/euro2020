<?php

namespace backend\models\ft;

use Yii;
use \common\models\ft\Tournament as TournamentModel;
use \backend\models\ft\query\TournamentQuery;
/**
* This is the model class for table "tournament".
*
* @property string $tournamentId
* @property integer $status
* @property integer $type
* @property string $title
* @property string $startDate
* @property string $endDate
*
* @property TournamentGroup[] $tournamentGroups
* @property TournamentGroupTable[] $tournamentGroupTables0
* @property TournamentRound[] $tournamentRounds
* @property UserTournamentGuessChamp[] $userTournamentGuessChamps0
* @property User[] $users
* @property UserTournamentPoint[] $userTournamentPoints
* @property User[] $users0
* @property UserTournamentSpecialCard[] $userTournamentSpecialCards
*/

class Tournament extends TournamentModel
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
    * @return \backend\models\ft\query\TournamentQuery the active query used by this AR class.
    */
    public static function find()
    {
        return new TournamentQuery(get_called_class());
    }
}
