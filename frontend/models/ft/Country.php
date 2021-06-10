<?php

namespace frontend\models\ft;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property int $countryId
 * @property int $status
 * @property string $name
 * @property string $alpha2Code
 * @property string $alpha3Code
 * @property string $demonym
 * @property string $nativeName
 * @property string $flag
 * @property string|null $cioc
 *
 * @property TournamentGroupTable[] $tournamentGroupTables
 * @property TournamentMatch[] $tournamentMatches
 * @property TournamentMatch[] $tournamentMatches0
 * @property UserTournamentGuessChamp[] $userTournamentGuessChamps
 */
class Country extends \common\models\ft\Country
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['name', 'alpha2Code', 'alpha3Code', 'nativeName', 'flag'], 'required'],
            [['name', 'nativeName', 'flag'], 'string', 'max' => 255],
            [['alpha2Code', 'alpha3Code', 'cioc'], 'string', 'max' => 10],
            [['demonym'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'countryId' => Yii::t('app', 'Country ID'),
            'status' => Yii::t('app', 'Status'),
            'name' => Yii::t('app', 'Name'),
            'alpha2Code' => Yii::t('app', 'Alpha2 Code'),
            'alpha3Code' => Yii::t('app', 'Alpha3 Code'),
            'demonym' => Yii::t('app', 'Demonym'),
            'nativeName' => Yii::t('app', 'Native Name'),
            'flag' => Yii::t('app', 'Flag'),
            'cioc' => Yii::t('app', 'Cioc'),
        ];
    }

    /**
     * Gets query for [[TournamentGroupTables]].
     *
     * @return \yii\db\ActiveQuery|TournamentGroupTableQuery
     */
    public function getTournamentGroupTables()
    {
        return $this->hasMany(TournamentGroupTable::className(), ['countryId' => 'countryId']);
    }

    /**
     * Gets query for [[TournamentMatches]].
     *
     * @return \yii\db\ActiveQuery|TournamentMatchQuery
     */
    public function getTournamentMatches()
    {
        return $this->hasMany(TournamentMatch::className(), ['homeCountryId' => 'countryId']);
    }

    /**
     * Gets query for [[TournamentMatches0]].
     *
     * @return \yii\db\ActiveQuery|TournamentMatchQuery
     */
    public function getTournamentMatches0()
    {
        return $this->hasMany(TournamentMatch::className(), ['awayContryId' => 'countryId']);
    }

    /**
     * Gets query for [[UserTournamentGuessChamps]].
     *
     * @return \yii\db\ActiveQuery|UserTournamentGuessChampQuery
     */
    public function getUserTournamentGuessChamps()
    {
        return $this->hasMany(UserTournamentGuessChamp::className(), ['countryId' => 'countryId']);
    }

    /**
     * {@inheritdoc}
     * @return CountryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CountryQuery(get_called_class());
    }
}
