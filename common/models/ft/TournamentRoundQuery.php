<?php

namespace common\models\ft;

/**
 * This is the ActiveQuery class for [[TournamentRound]].
 *
 * @see TournamentRound
 */
class TournamentRoundQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TournamentRound[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TournamentRound|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
