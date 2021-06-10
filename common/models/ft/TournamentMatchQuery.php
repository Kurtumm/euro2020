<?php

namespace common\models\ft;

/**
 * This is the ActiveQuery class for [[TournamentMatch]].
 *
 * @see TournamentMatch
 */
class TournamentMatchQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TournamentMatch[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TournamentMatch|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
