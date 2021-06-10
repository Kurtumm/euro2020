<?php

namespace frontend\models\ft;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 *
 * @property UserProfile[] $userProfiles
 * @property UserTournamentGuessChamp[] $userTournamentGuessChamps
 * @property Tournament[] $tournaments
 * @property UserTournamentMatch[] $userTournamentMatches
 * @property TournamentMatch[] $tournamentMatches
 * @property UserTournamentSpecialCard[] $userTournamentSpecialCards
 */
class User extends \common\models\ft\User
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'verification_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'email' => Yii::t('app', 'Email'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'verification_token' => Yii::t('app', 'Verification Token'),
        ];
    }

    /**
     * Gets query for [[UserProfiles]].
     *
     * @return \yii\db\ActiveQuery|UserProfileQuery
     */
    public function getUserProfiles()
    {
        return $this->hasMany(UserProfile::className(), ['userId' => 'id']);
    }

    /**
     * Gets query for [[UserTournamentGuessChamps]].
     *
     * @return \yii\db\ActiveQuery|UserTournamentGuessChampQuery
     */
    public function getUserTournamentGuessChamps()
    {
        return $this->hasMany(UserTournamentGuessChamp::className(), ['userId' => 'id']);
    }

    /**
     * Gets query for [[Tournaments]].
     *
     * @return \yii\db\ActiveQuery|TournamentQuery
     */
    public function getTournaments()
    {
        return $this->hasMany(Tournament::className(), ['tournamentId' => 'tournamentId'])->viaTable('user_tournament_guess_champ', ['userId' => 'id']);
    }

    /**
     * Gets query for [[UserTournamentMatches]].
     *
     * @return \yii\db\ActiveQuery|UserTournamentMatchQuery
     */
    public function getUserTournamentMatches()
    {
        return $this->hasMany(UserTournamentMatch::className(), ['userId' => 'id']);
    }

    /**
     * Gets query for [[TournamentMatches]].
     *
     * @return \yii\db\ActiveQuery|TournamentMatchQuery
     */
    public function getTournamentMatches()
    {
        return $this->hasMany(TournamentMatch::className(), ['tournamentMatchId' => 'tournamentMatchId'])->viaTable('user_tournament_match', ['userId' => 'id']);
    }

    /**
     * Gets query for [[UserTournamentSpecialCards]].
     *
     * @return \yii\db\ActiveQuery|UserTournamentSpecialCardQuery
     */
    public function getUserTournamentSpecialCards()
    {
        return $this->hasMany(UserTournamentSpecialCard::className(), ['userId' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }
}
