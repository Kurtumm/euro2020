<?php

namespace common\models\ft;

use Yii;

/**
 * This is the model class for table "special_card".
 *
 * @property int $specialCardId
 * @property int $status
 * @property string $title
 * @property int $multiple
 *
 * @property UserTournamentSpecialCard[] $userTournamentSpecialCards
 */
class SpecialCard extends \common\models\MasterModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'special_card';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'multiple'], 'integer'],
            [['title', 'multiple'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'specialCardId' => Yii::t('app', 'Special Card ID'),
            'status' => Yii::t('app', 'Status'),
            'title' => Yii::t('app', 'Title'),
            'multiple' => Yii::t('app', 'Multiple'),
        ];
    }

    /**
     * Gets query for [[UserTournamentSpecialCards]].
     *
     * @return \yii\db\ActiveQuery|UserTournamentSpecialCardQuery
     */
    public function getUserTournamentSpecialCards()
    {
        return $this->hasMany(UserTournamentSpecialCard::className(), ['specialCardId' => 'specialCardId']);
    }

    /**
     * {@inheritdoc}
     * @return SpecialCardQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SpecialCardQuery(get_called_class());
    }
}
