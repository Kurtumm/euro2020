<?php

namespace common\models\ft;

use Yii;

/**
 * This is the model class for table "tournament_match".
 *
 * @property int $tournamentMatchId
 * @property int $status
 * @property int $tournamentGroupId
 * @property int $tournamentRoundId
 * @property int|null $title
 * @property int $homeCountryId
 * @property int|null $homeScore
 * @property int $awayCountryId
 * @property int|null $awayScore
 * @property int|null $matchResult
 * @property string $matchDateTime
 *
 * @property Country $homeCountry
 * @property Country $awayCountry
 * @property TournamentGroup $tournamentGroup
 * @property TournamentRound $tournamentRound
 * @property UserTournamentMatch[] $userTournamentMatches
 * @property User[] $users
 */
class TournamentMatch extends \common\models\MasterModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tournament_match';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'tournamentGroupId', 'tournamentRoundId', 'title', 'homeCountryId', 'homeScore', 'awayCountryId', 'awayScore', 'matchResult'], 'integer'],
            [['tournamentGroupId', 'tournamentRoundId', 'homeCountryId', 'awayCountryId', 'matchDateTime'], 'required'],
            [['matchDateTime'], 'safe'],
            [['homeCountryId'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['homeCountryId' => 'countryId']],
            [['awayCountryId'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['awayCountryId' => 'countryId']],
            [['tournamentGroupId'], 'exist', 'skipOnError' => true, 'targetClass' => TournamentGroup::className(), 'targetAttribute' => ['tournamentGroupId' => 'tournamentGroupId']],
            [['tournamentRoundId'], 'exist', 'skipOnError' => true, 'targetClass' => TournamentRound::className(), 'targetAttribute' => ['tournamentRoundId' => 'tournamentRoundId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tournamentMatchId' => Yii::t('app', 'Tournament Match ID'),
            'status' => Yii::t('app', 'Status'),
            'tournamentGroupId' => Yii::t('app', 'Tournament Group ID'),
            'tournamentRoundId' => Yii::t('app', 'Tournament Round ID'),
            'title' => Yii::t('app', 'Title'),
            'homeCountryId' => Yii::t('app', 'Home Country ID'),
            'homeScore' => Yii::t('app', 'Home Score'),
            'awayCountryId' => Yii::t('app', 'Away Country ID'),
            'awayScore' => Yii::t('app', 'Away Score'),
            'matchResult' => Yii::t('app', 'Match Result'),
            'matchDateTime' => Yii::t('app', 'Match Date Time'),
        ];
    }

    /**
     * Gets query for [[HomeCountry]].
     *
     * @return \yii\db\ActiveQuery|CountryQuery
     */
    public function getHomeCountry()
    {
        return $this->hasOne(Country::className(), ['countryId' => 'homeCountryId']);
    }

    /**
     * Gets query for [[AwayCountry]].
     *
     * @return \yii\db\ActiveQuery|CountryQuery
     */
    public function getAwayCountry()
    {
        return $this->hasOne(Country::className(), ['countryId' => 'awayCountryId']);
    }

    /**
     * Gets query for [[TournamentGroup]].
     *
     * @return \yii\db\ActiveQuery|TournamentGroupQuery
     */
    public function getTournamentGroup()
    {
        return $this->hasOne(TournamentGroup::className(), ['tournamentGroupId' => 'tournamentGroupId']);
    }

    /**
     * Gets query for [[TournamentRound]].
     *
     * @return \yii\db\ActiveQuery|TournamentRoundQuery
     */
    public function getTournamentRound()
    {
        return $this->hasOne(TournamentRound::className(), ['tournamentRoundId' => 'tournamentRoundId']);
    }

    /**
     * Gets query for [[UserTournamentMatches]].
     *
     * @return \yii\db\ActiveQuery|UserTournamentMatchQuery
     */
    public function getUserTournamentMatches()
    {
        return $this->hasMany(UserTournamentMatch::className(), ['tournamentMatchId' => 'tournamentMatchId']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'userId'])->viaTable('user_tournament_match', ['tournamentMatchId' => 'tournamentMatchId']);
    }

    /**
     * {@inheritdoc}
     * @return TournamentMatchQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TournamentMatchQuery(get_called_class());
    }
}
