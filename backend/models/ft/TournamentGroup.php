<?php

namespace backend\models\ft;

use Yii;
use \common\models\ft\TournamentGroup as TournamentGroupModel;
use \backend\models\ft\query\TournamentGroupQuery;
/**
* This is the model class for table "tournament_group".
*
* @property string $tournamentGroupId
* @property integer $status
* @property string $tournamentId
* @property string $title
*
* @property Tournament $tournament
* @property TournamentMatch[] $tournamentMatches1
*/

class TournamentGroup extends TournamentGroupModel
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
    * @return \backend\models\ft\query\TournamentGroupQuery the active query used by this AR class.
    */
    public static function find()
    {
        return new TournamentGroupQuery(get_called_class());
    }
}
