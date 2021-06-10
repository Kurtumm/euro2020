<?php

namespace frontend\models\ft;

use Yii;

/**
 * This is the model class for table "user_tournament_guess_champ".
 *
 * @property int $userId
 * @property int $tournamentId
 * @property int $countryId
 *
 * @property Tournament $tournament
 * @property User $user
 * @property Country $country
 */
class UserTournamentGuessChamp extends \common\models\ft\UserTournamentGuessChamp
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_tournament_guess_champ';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userId', 'tournamentId', 'countryId'], 'required'],
            [['userId', 'tournamentId', 'countryId'], 'integer'],
            [['userId', 'tournamentId'], 'unique', 'targetAttribute' => ['userId', 'tournamentId']],
            [['tournamentId'], 'exist', 'skipOnError' => true, 'targetClass' => Tournament::className(), 'targetAttribute' => ['tournamentId' => 'tournamentId']],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
            [['countryId'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['countryId' => 'countryId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'userId' => Yii::t('app', 'User ID'),
            'tournamentId' => Yii::t('app', 'Tournament ID'),
            'countryId' => Yii::t('app', 'Country ID'),
        ];
    }

    /**
     * Gets query for [[Tournament]].
     *
     * @return \yii\db\ActiveQuery|TournamentQuery
     */
    public function getTournament()
    {
        return $this->hasOne(Tournament::className(), ['tournamentId' => 'tournamentId']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery|CountryQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['countryId' => 'countryId']);
    }

    /**
     * {@inheritdoc}
     * @return UserTournamentGuessChampQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserTournamentGuessChampQuery(get_called_class());
    }
}
