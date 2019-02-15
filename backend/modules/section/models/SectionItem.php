<?php

namespace backend\modules\section\models;

use Yii;

/**
 * This is the model class for table "section_item".
 *
 * @property int $id
 * @property int $page_id
 * @property string $name
 * @property int $sort
 *
 * @property SectionBlock[] $sectionBlocks
 * @property SectionPage $page
 */
class SectionItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'section_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page_id', 'name', 'sort'], 'required'],
            [['page_id', 'sort'], 'integer'],
            [['name'], 'string', 'max' => 127],
            [['page_id'], 'exist', 'skipOnError' => true, 'targetClass' => SectionPage::className(), 'targetAttribute' => ['page_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yee/section', 'ID'),
            'page_id' => Yii::t('yee/section', 'Page ID'),
            'name' => Yii::t('yee/section', 'Name'),
            'sort' => Yii::t('yee/section', 'Sort'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSectionBlocks()
    {
        return $this->hasMany(SectionBlock::className(), ['item_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPage()
    {
        return $this->hasOne(SectionPage::className(), ['id' => 'page_id']);
    }
}
