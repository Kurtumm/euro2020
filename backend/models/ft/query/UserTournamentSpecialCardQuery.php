<?php

namespace backend\models\ft\query;

/**
 * This is the ActiveQuery class for [[\backend\models\ft\UserTournamentSpecialCard]].
 *
 * @see \backend\models\ft\UserTournamentSpecialCard
 */
class UserTournamentSpecialCardQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \backend\models\ft\UserTournamentSpecialCard[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \backend\models\ft\UserTournamentSpecialCard|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
