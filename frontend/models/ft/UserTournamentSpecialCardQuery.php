<?php

namespace frontend\models\ft;

/**
 * This is the ActiveQuery class for [[UserTournamentSpecialCard]].
 *
 * @see UserTournamentSpecialCard
 */
class UserTournamentSpecialCardQuery extends \common\models\ft\UserTournamentSpecialCardQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserTournamentSpecialCard[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserTournamentSpecialCard|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
