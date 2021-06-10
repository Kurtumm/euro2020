<?php

namespace backend\models\ft;

use Yii;
use \common\models\ft\User as UserModel;
use \backend\models\ft\query\UserQuery;
/**
* This is the model class for table "user".
*
* @property integer $id
* @property string $username
* @property string $auth_key
* @property string $password_hash
* @property string $password_reset_token
* @property string $email
* @property integer $status
* @property integer $created_at
* @property integer $updated_at
* @property string $verification_token
*
* @property UserHasTournamentMatch[] $userHasTournamentMatches
* @property TournamentMatch[] $tournamentMatches1
* @property UserProfile[] $userProfiles
* @property UserTournamentGuessChamp[] $userTournamentGuessChamps0
* @property Tournament[] $tournaments
* @property UserTournamentPoint[] $userTournamentPoints
* @property Tournament[] $tournaments0
* @property UserTournamentSpecialCard[] $userTournamentSpecialCards
*/

class User extends UserModel
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
    * @return \backend\models\ft\query\UserQuery the active query used by this AR class.
    */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }
}
