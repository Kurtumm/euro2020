<?php

namespace frontend\models\ft;

use Yii;

/**
 * This is the model class for table "user_tournament_special_card".
 *
 * @property int $userTournamentSpecialCardId
 * @property int $status
 * @property int $userId
 * @property int $tournamentId
 * @property int $specialCardId
 * @property int $multiple
 * @property int $quota
 * @property int $used
 *
 * @property UserTournamentMatch[] $userTournamentMatches
 * @property SpecialCard $specialCard
 * @property Tournament $tournament
 * @property User $user
 */
class UserTournamentSpecialCard extends \common\models\ft\UserTournamentSpecialCard
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_tournament_special_card';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'userId', 'tournamentId', 'specialCardId', 'multiple', 'quota', 'used'], 'integer'],
            [['userId', 'tournamentId', 'specialCardId', 'multiple', 'quota', 'used'], 'required'],
            [['specialCardId'], 'exist', 'skipOnError' => true, 'targetClass' => SpecialCard::className(), 'targetAttribute' => ['specialCardId' => 'specialCardId']],
            [['tournamentId'], 'exist', 'skipOnError' => true, 'targetClass' => Tournament::className(), 'targetAttribute' => ['tournamentId' => 'tournamentId']],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'userTournamentSpecialCardId' => Yii::t('app', 'User Tournament Special Card ID'),
            'status' => Yii::t('app', 'Status'),
            'userId' => Yii::t('app', 'User ID'),
            'tournamentId' => Yii::t('app', 'Tournament ID'),
            'specialCardId' => Yii::t('app', 'Special Card ID'),
            'multiple' => Yii::t('app', 'Multiple'),
            'quota' => Yii::t('app', 'Quota'),
            'used' => Yii::t('app', 'Used'),
        ];
    }

    /**
     * Gets query for [[UserTournamentMatches]].
     *
     * @return \yii\db\ActiveQuery|UserTournamentMatchQuery
     */
    public function getUserTournamentMatches()
    {
        return $this->hasMany(UserTournamentMatch::className(), ['userTournamentSpecialCardId' => 'userTournamentSpecialCardId']);
    }

    /**
     * Gets query for [[SpecialCard]].
     *
     * @return \yii\db\ActiveQuery|SpecialCardQuery
     */
    public function getSpecialCard()
    {
        return $this->hasOne(SpecialCard::className(), ['specialCardId' => 'specialCardId']);
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
     * {@inheritdoc}
     * @return UserTournamentSpecialCardQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserTournamentSpecialCardQuery(get_called_class());
    }
}
