<?php

namespace backend\models\ft;

use Yii;
use \common\models\ft\UserTournamentPoint as UserTournamentPointModel;
use \backend\models\ft\query\UserTournamentPointQuery;
/**
* This is the model class for table "user_tournament_point".
*
* @property integer $userId
* @property string $tournamentId
* @property integer $point
*
* @property Tournament $tournament
* @property User $user
*/

class UserTournamentPoint extends UserTournamentPointModel
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
    * @return \backend\models\ft\query\UserTournamentPointQuery the active query used by this AR class.
    */
    public static function find()
    {
        return new UserTournamentPointQuery(get_called_class());
    }
}
