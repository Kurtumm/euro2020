<?php

namespace common\models\ft;

use Yii;

/**
 * This is the model class for table "tournament_round".
 *
 * @property int $tournamentRoundId
 * @property int $status
 * @property int $tournamentId
 * @property string $title
 *
 * @property TournamentMatch[] $tournamentMatches
 * @property Tournament $tournament
 */
class TournamentRound extends \common\models\MasterModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tournament_round';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'tournamentId'], 'integer'],
            [['tournamentId', 'title'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['tournamentId'], 'exist', 'skipOnError' => true, 'targetClass' => Tournament::className(), 'targetAttribute' => ['tournamentId' => 'tournamentId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tournamentRoundId' => Yii::t('app', 'Tournament Round ID'),
            'status' => Yii::t('app', 'Status'),
            'tournamentId' => Yii::t('app', 'Tournament ID'),
            'title' => Yii::t('app', 'Title'),
        ];
    }

    /**
     * Gets query for [[TournamentMatches]].
     *
     * @return \yii\db\ActiveQuery|TournamentMatchQuery
     */
    public function getTournamentMatches()
    {
        return $this->hasMany(TournamentMatch::className(), ['tournamentRoundId' => 'tournamentRoundId']);
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
     * {@inheritdoc}
     * @return TournamentRoundQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TournamentRoundQuery(get_called_class());
    }
}
