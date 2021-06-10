<?php

namespace backend\models\ft\query;

/**
 * This is the ActiveQuery class for [[\backend\models\ft\TournamentGroup]].
 *
 * @see \backend\models\ft\TournamentGroup
 */
class TournamentGroupQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \backend\models\ft\TournamentGroup[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \backend\models\ft\TournamentGroup|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
