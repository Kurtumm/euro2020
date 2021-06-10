<?php

namespace backend\models\ft\query;

/**
 * This is the ActiveQuery class for [[\backend\models\ft\UserProfile]].
 *
 * @see \backend\models\ft\UserProfile
 */
class UserProfileQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \backend\models\ft\UserProfile[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \backend\models\ft\UserProfile|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
