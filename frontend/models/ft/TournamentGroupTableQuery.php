<?php

namespace frontend\models\ft;

/**
 * This is the ActiveQuery class for [[TournamentGroupTable]].
 *
 * @see TournamentGroupTable
 */
class TournamentGroupTableQuery extends \common\models\ft\TournamentGroupTableQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TournamentGroupTable[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TournamentGroupTable|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
