<?php

namespace frontend\models\ft;

/**
 * This is the ActiveQuery class for [[UserTournamentGuessChamp]].
 *
 * @see UserTournamentGuessChamp
 */
class UserTournamentGuessChampQuery extends \common\models\ft\UserTournamentGuessChampQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserTournamentGuessChamp[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserTournamentGuessChamp|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
