<?php

namespace frontend\models\ft;

/**
 * This is the ActiveQuery class for [[UserTournamentMatch]].
 *
 * @see UserTournamentMatch
 */
class UserTournamentMatchQuery extends \common\models\ft\UserTournamentMatchQeury
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserTournamentMatch[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserTournamentMatch|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
