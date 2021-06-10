<?php

namespace backend\models\ft;

use Yii;
use \common\models\ft\UserTournamentGuessChamp as UserTournamentGuessChampModel;
use \backend\models\ft\query\UserTournamentGuessChampQuery;
/**
* This is the model class for table "user_tournament_guess_champ".
*
* @property integer $userId
* @property string $tournamentId
* @property integer $countryId
*
* @property Tournament $tournament
* @property User $user
* @property Country $country
*/

class UserTournamentGuessChamp extends UserTournamentGuessChampModel
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
    * @return \backend\models\ft\query\UserTournamentGuessChampQuery the active query used by this AR class.
    */
    public static function find()
    {
        return new UserTournamentGuessChampQuery(get_called_class());
    }
}
