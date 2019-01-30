<?php

namespace backend\modules\portfolio\models\query;

/**
 * This is the ActiveQuery class for [[\backend\modules\portfolio\models\Items]].
 *
 * @see \backend\modules\portfolio\models\PortfolioItems
 */
class ItemsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \backend\modules\portfolio\models\Items[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \backend\modules\portfolio\models\Items|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
