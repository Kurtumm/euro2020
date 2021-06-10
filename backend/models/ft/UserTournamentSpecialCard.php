<?php

namespace backend\models\ft;

use Yii;
use \common\models\ft\UserTournamentSpecialCard as UserTournamentSpecialCardModel;
use \backend\models\ft\query\UserTournamentSpecialCardQuery;
/**
* This is the model class for table "user_tournament_special_card".
*
* @property string $id
* @property integer $status
* @property integer $userId
* @property string $tournamentId
* @property string $specialCardId
* @property integer $multiple
* @property integer $qouta
* @property integer $used
*
* @property User $user
* @property Tournament $tournament
* @property SpecialCard $specialCard
*/

class UserTournamentSpecialCard extends UserTournamentSpecialCardModel
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
    * @return \backend\models\ft\query\UserTournamentSpecialCardQuery the active query used by this AR class.
    */
    public static function find()
    {
        return new UserTournamentSpecialCardQuery(get_called_class());
    }
}
