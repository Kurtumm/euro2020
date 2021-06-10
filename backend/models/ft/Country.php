<?php

namespace backend\models\ft;

use Yii;
use \common\models\ft\Country as CountryModel;
use \backend\models\ft\query\CountryQuery;
/**
* This is the model class for table "country".
*
* @property integer $countryId
* @property integer $status
* @property string $name
* @property string $alpha2Code
* @property string $alpha3Code
* @property string $demonym
* @property string $nativeName
* @property string $flag
* @property string $cioc
*
* @property TournamentGroupTable[] $tournamentGroupTables0
* @property TournamentMatch[] $tournamentMatches1
* @property TournamentMatch[] $tournamentMatches2
* @property UserTournamentGuessChamp[] $userTournamentGuessChamps0
*/

class Country extends CountryModel
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
    * @return \backend\models\ft\query\CountryQuery the active query used by this AR class.
    */
    public static function find()
    {
        return new CountryQuery(get_called_class());
    }
}
