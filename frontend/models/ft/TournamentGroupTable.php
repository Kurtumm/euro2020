<?php

namespace frontend\models\ft;

use Yii;

/**
 * This is the model class for table "tournament_group_table".
 *
 * @property int $tournamentGroupTableId
 * @property int $status
 * @property int $tournamentId
 * @property int $tournamentGroupId
 * @property int $countryId
 * @property string $title
 * @property int $won
 * @property int $draw
 * @property int $lost
 * @property int $gf
 * @property int $ga
 * @property int $gd
 * @property int $point
 *
 * @property Country $country
 * @property Tournament $tournament
 * @property TournamentGroup $tournamentGroup
 */
class TournamentGroupTable extends \common\models\ft\TournamentGroupTable
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tournament_group_table';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'tournamentId', 'tournamentGroupId', 'countryId', 'won', 'draw', 'lost', 'gf', 'ga', 'gd', 'point'], 'integer'],
            [['tournamentId', 'tournamentGroupId', 'countryId', 'title'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['countryId'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['countryId' => 'countryId']],
            [['tournamentId'], 'exist', 'skipOnError' => true, 'targetClass' => Tournament::className(), 'targetAttribute' => ['tournamentId' => 'tournamentId']],
            [['tournamentGroupId'], 'exist', 'skipOnError' => true, 'targetClass' => TournamentGroup::className(), 'targetAttribute' => ['tournamentGroupId' => 'tournamentGroupId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tournamentGroupTableId' => Yii::t('app', 'Tournament Group Table ID'),
            'status' => Yii::t('app', 'Status'),
            'tournamentId' => Yii::t('app', 'Tournament ID'),
            'tournamentGroupId' => Yii::t('app', 'Tournament Group ID'),
            'countryId' => Yii::t('app', 'Country ID'),
            'title' => Yii::t('app', 'Title'),
            'won' => Yii::t('app', 'Won'),
            'draw' => Yii::t('app', 'Draw'),
            'lost' => Yii::t('app', 'Lost'),
            'gf' => Yii::t('app', 'Gf'),
            'ga' => Yii::t('app', 'Ga'),
            'gd' => Yii::t('app', 'Gd'),
            'point' => Yii::t('app', 'Point'),
        ];
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
     * Gets query for [[Tournament]].
     *
     * @return \yii\db\ActiveQuery|TournamentQuery
     */
    public function getTournament()
    {
        return $this->hasOne(Tournament::className(), ['tournamentId' => 'tournamentId']);
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
     * {@inheritdoc}
     * @return TournamentGroupTableQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TournamentGroupTableQuery(get_called_class());
    }
}
