<?php

namespace common\models\ft;

use Yii;

/**
 * This is the model class for table "tournament".
 *
 * @property int $tournamentId
 * @property int $status
 * @property int $type
 * @property string $title
 * @property string $startDate
 * @property string $endDate
 *
 * @property TournamentGroup[] $tournamentGroups
 * @property TournamentGroupTable[] $tournamentGroupTables
 * @property TournamentRound[] $tournamentRounds
 * @property UserTournamentGuessChamp[] $userTournamentGuessChamps
 * @property User[] $users
 * @property UserTournamentSpecialCard[] $userTournamentSpecialCards
 */
class Tournament extends \common\models\MasterModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tournament';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'type'], 'integer'],
            [['title', 'startDate', 'endDate'], 'required'],
            [['startDate', 'endDate'], 'safe'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tournamentId' => Yii::t('app', 'Tournament ID'),
            'status' => Yii::t('app', 'Status'),
            'type' => Yii::t('app', 'Type'),
            'title' => Yii::t('app', 'Title'),
            'startDate' => Yii::t('app', 'Start Date'),
            'endDate' => Yii::t('app', 'End Date'),
        ];
    }

    /**
     * Gets query for [[TournamentGroups]].
     *
     * @return \yii\db\ActiveQuery|TournamentGroupQuery
     */
    public function getTournamentGroups()
    {
        return $this->hasMany(TournamentGroup::className(), ['tournamentId' => 'tournamentId']);
    }

    /**
     * Gets query for [[TournamentGroupTables]].
     *
     * @return \yii\db\ActiveQuery|TournamentGroupTableQuery
     */
    public function getTournamentGroupTables()
    {
        return $this->hasMany(TournamentGroupTable::className(), ['tournamentId' => 'tournamentId']);
    }

    /**
     * Gets query for [[TournamentRounds]].
     *
     * @return \yii\db\ActiveQuery|TournamentRoundQuery
     */
    public function getTournamentRounds()
    {
        return $this->hasMany(TournamentRound::className(), ['tournamentId' => 'tournamentId']);
    }

    /**
     * Gets query for [[UserTournamentGuessChamps]].
     *
     * @return \yii\db\ActiveQuery|UserTournamentGuessChampQuery
     */
    public function getUserTournamentGuessChamps()
    {
        return $this->hasMany(UserTournamentGuessChamp::className(), ['tournamentId' => 'tournamentId']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'userId'])->viaTable('user_tournament_guess_champ', ['tournamentId' => 'tournamentId']);
    }

    /**
     * Gets query for [[UserTournamentSpecialCards]].
     *
     * @return \yii\db\ActiveQuery|UserTournamentSpecialCardQuery
     */
    public function getUserTournamentSpecialCards()
    {
        return $this->hasMany(UserTournamentSpecialCard::className(), ['tournamentId' => 'tournamentId']);
    }

    /**
     * {@inheritdoc}
     * @return TournamentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TournamentQuery(get_called_class());
    }
}
