<?php

namespace frontend\models\ft;

use Yii;

/**
 * This is the model class for table "tournament_group".
 *
 * @property int $tournamentGroupId
 * @property int $status
 * @property string $title
 * @property int $tournamentId
 *
 * @property Tournament $tournament
 * @property TournamentGroupTable[] $tournamentGroupTables
 * @property TournamentMatch[] $tournamentMatches
 */
class TournamentGroup extends \common\models\ft\TournamentGroup
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tournament_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'title', 'tournamentId'], 'required'],
            [['status', 'tournamentId'], 'integer'],
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
            'tournamentGroupId' => Yii::t('app', 'Tournament Group ID'),
            'status' => Yii::t('app', 'Status'),
            'title' => Yii::t('app', 'Title'),
            'tournamentId' => Yii::t('app', 'Tournament ID'),
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
     * Gets query for [[TournamentGroupTables]].
     *
     * @return \yii\db\ActiveQuery|TournamentGroupTableQuery
     */
    public function getTournamentGroupTables()
    {
        return $this->hasMany(TournamentGroupTable::className(), ['tournamentGroupId' => 'tournamentGroupId']);
    }

    /**
     * Gets query for [[TournamentMatches]].
     *
     * @return \yii\db\ActiveQuery|TournamentMatchQuery
     */
    public function getTournamentMatches()
    {
        return $this->hasMany(TournamentMatch::className(), ['tournamentGroupId' => 'tournamentGroupId']);
    }

    /**
     * {@inheritdoc}
     * @return TournamentGroupQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TournamentGroupQuery(get_called_class());
    }
}
