<?php

namespace backend\models\ft;

use Yii;
use \common\models\ft\TournamentGroupTable as TournamentGroupTableModel;
use \backend\models\ft\query\TournamentGroupTableQuery;
/**
* This is the model class for table "tournament_group_table".
*
* @property string $tournamentGroupTableId
* @property string $status
* @property string $tournamentId
* @property integer $countryId
* @property string $title
* @property integer $won
* @property integer $draw
* @property integer $lost
* @property integer $gf
* @property integer $ga
* @property integer $point
*
* @property Country $country
* @property Tournament $tournament
* @property TournamentMatch[] $tournamentMatches1
*/

class TournamentGroupTable extends TournamentGroupTableModel
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
    * @return \backend\models\ft\query\TournamentGroupTableQuery the active query used by this AR class.
    */
    public static function find()
    {
        return new TournamentGroupTableQuery(get_called_class());
    }
}
