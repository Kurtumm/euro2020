<?php

namespace backend\models\ft\query;

/**
 * This is the ActiveQuery class for [[\backend\models\ft\Tournament]].
 *
 * @see \backend\models\ft\Tournament
 */
class TournamentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \backend\models\ft\Tournament[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \backend\models\ft\Tournament|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
