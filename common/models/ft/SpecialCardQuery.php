<?php

namespace common\models\ft;

/**
 * This is the ActiveQuery class for [[SpecialCard]].
 *
 * @see SpecialCard
 */
class SpecialCardQuery extends \yii\db\ActiveQuery
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
