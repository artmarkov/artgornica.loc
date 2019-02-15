<?php

namespace backend\modules\section\models;

use Yii;

/**
 * This is the model class for table "section_block".
 *
 * @property int $id
 * @property int $item_id
 * @property int $coll_num
 * @property int $row_num
 * @property int $coll_grid_size
 * @property int $created_at
 * @property int $updated_at
 *
 * @property SectionItem $item
 */
class SectionBlock extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'section_block';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_id', 'coll_num', 'row_num', 'coll_grid_size', 'created_at', 'updated_at'], 'required'],
            [['item_id', 'coll_num', 'row_num', 'coll_grid_size', 'created_at', 'updated_at'], 'integer'],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => SectionItem::className(), 'targetAttribute' => ['item_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yee/section', 'ID'),
            'item_id' => Yii::t('yee/section', 'Item ID'),
            'coll_num' => Yii::t('yee/section', 'Coll Num'),
            'row_num' => Yii::t('yee/section', 'Row Num'),
            'coll_grid_size' => Yii::t('yee/section', 'Coll Grid Size'),
            'created_at' => Yii::t('yee/section', 'Created At'),
            'updated_at' => Yii::t('yee/section', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(SectionItem::className(), ['id' => 'item_id']);
    }
}
