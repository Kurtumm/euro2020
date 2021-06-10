<?php

namespace frontend\models\ft;

/**
 * This is the ActiveQuery class for [[SpecialCard]].
 *
 * @see SpecialCard
 */
class SpecialCardQuery extends \common\models\ft\SpecialCardQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return SpecialCard[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return SpecialCard|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
