<?php

namespace frontend\models\ft;

/**
 * This is the ActiveQuery class for [[TournamentGroup]].
 *
 * @see TournamentGroup
 */
class TournamentGroupQuery extends \common\models\ft\TournamentGroupQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TournamentGroup[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TournamentGroup|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
