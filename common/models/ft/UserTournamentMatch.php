<?php

namespace common\models\ft;

use Yii;

/**
 * This is the model class for table "user_tournament_match".
 *
 * @property int $userId
 * @property int $tournamentMatchId
 * @property int $status
 * @property int $matchResult
 * @property int $homeScore
 * @property int $awayScore
 * @property int|null $userTournamentSpecialCardId
 * @property int $multiplePoint
 * @property int|null $point
 * @property int|null $scorePoint
 * @property int|null $totalPoint
 * @property string $createDateTime
 * @property string $updateDateTime
 *
 * @property TournamentMatch $tournamentMatch
 * @property User $user
 * @property UserTournamentSpecialCard $userTournamentSpecialCard
 */
class UserTournamentMatch extends \common\models\MasterModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_tournament_match';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userId', 'tournamentMatchId', 'matchResult', 'homeScore', 'awayScore'], 'required'],
            [['userId', 'tournamentMatchId', 'status', 'matchResult', 'homeScore', 'awayScore', 'userTournamentSpecialCardId', 'multiplePoint', 'point', 'scorePoint', 'totalPoint'], 'integer'],
            [['createDateTime', 'updateDateTime'], 'safe'],
            [['userId', 'tournamentMatchId'], 'unique', 'targetAttribute' => ['userId', 'tournamentMatchId']],
            [['tournamentMatchId'], 'exist', 'skipOnError' => true, 'targetClass' => TournamentMatch::className(), 'targetAttribute' => ['tournamentMatchId' => 'tournamentMatchId']],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
            [['userTournamentSpecialCardId'], 'exist', 'skipOnError' => true, 'targetClass' => UserTournamentSpecialCard::className(), 'targetAttribute' => ['userTournamentSpecialCardId' => 'userTournamentSpecialCardId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'userId' => Yii::t('app', 'User ID'),
            'tournamentMatchId' => Yii::t('app', 'Tournament Match ID'),
            'status' => Yii::t('app', 'Status'),
            'matchResult' => Yii::t('app', 'Match Result'),
            'homeScore' => Yii::t('app', 'Home Score'),
            'awayScore' => Yii::t('app', 'Away Score'),
            'userTournamentSpecialCardId' => Yii::t('app', 'User Tournament Special Card ID'),
            'multiplePoint' => Yii::t('app', 'Multiple Point'),
            'point' => Yii::t('app', 'Point'),
            'scorePoint' => Yii::t('app', 'Score Point'),
            'totalPoint' => Yii::t('app', 'Total Point'),
            'createDateTime' => Yii::t('app', 'Create Date Time'),
            'updateDateTime' => Yii::t('app', 'Update Date Time'),
        ];
    }

    /**
     * Gets query for [[TournamentMatch]].
     *
     * @return \yii\db\ActiveQuery|TournamentMatchQuery
     */
    public function getTournamentMatch()
    {
        return $this->hasOne(TournamentMatch::className(), ['tournamentMatchId' => 'tournamentMatchId']);
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
     * Gets query for [[UserTournamentSpecialCard]].
     *
     * @return \yii\db\ActiveQuery|UserTournamentSpecialCardQuery
     */
    public function getUserTournamentSpecialCard()
    {
        return $this->hasOne(UserTournamentSpecialCard::className(), ['userTournamentSpecialCardId' => 'userTournamentSpecialCardId']);
    }

    /**
     * {@inheritdoc}
     * @return UserTournamentMatchQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserTournamentMatchQuery(get_called_class());
    }
}
