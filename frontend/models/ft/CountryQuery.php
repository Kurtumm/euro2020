<?php

namespace frontend\models\ft;

/**
 * This is the ActiveQuery class for [[Country]].
 *
 * @see Country
 */
class CountryQuery extends \common\models\ft\CountryQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Country[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Country|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
