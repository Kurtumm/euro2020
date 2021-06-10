<?php

namespace backend\models\ft\query;

/**
 * This is the ActiveQuery class for [[\backend\models\ft\UserHasTournamentMatch]].
 *
 * @see \backend\models\ft\UserHasTournamentMatch
 */
class UserHasTournamentMatchQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \backend\models\ft\UserHasTournamentMatch[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \backend\models\ft\UserHasTournamentMatch|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
