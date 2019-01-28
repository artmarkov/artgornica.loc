<?php

namespace backend\modules\section\models\query;

/**
 * This is the ActiveQuery class for [[\backend\modules\section\models\Carousel]].
 *
 * @see \backend\modules\section\models\Carousel
 */
class CarouselQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \backend\modules\section\models\Carousel[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \backend\modules\section\models\Carousel|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
