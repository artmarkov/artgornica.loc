<?php

namespace common\components\grid\columns;

use yii\grid\DataColumn;
use yii\helpers\Html;
use kartik\date\DatePicker;

class DateFilterColumn extends DataColumn
{
    /**
     * @var array
     */
    public $contentOptions = ['style' => 'text-align:center; vertical-align: middle;'];

    /**
     * @var array
     */
    public $headerOptions = ['style' => 'text-align:center;'];

    /**
     * Renders the filter cell content.
     * The default implementation simply renders a space.
     * This method may be overridden to customize the rendering of the filter cell (if any).
     * @return string the rendering result
     */
    protected function renderFilterCellContent()
    {
        if (is_string($this->filter)) {
            return $this->filter;
        }

        $model = $this->grid->filterModel;

        if ($this->filter !== false && $this->attribute !== null && $model->isAttributeActive($this->attribute)) {
            if ($model->hasErrors($this->attribute)) {
                Html::addCssClass($this->filterOptions, 'has-error');
                $error = ' ' . Html::error($model, $this->attribute,
                        $this->grid->filterErrorOptions);
            } else {
                $error = '';
            }

            $filterOptions = ['=' => '=', '>' => '>', '<' => '<'];
            Html::addCssClass($this->filterInputOptions, 'date-filter-input');

            $dropDown = Html::activeDropDownList($model,
                $this->attribute . '_operand', $filterOptions, [
                    'class' => 'form-control pull-left',
                    'style' => 'width: 32px; appearance: none; -moz-appearance: none; -webkit-appearance: none;',
                    ]);
            $field = DatePicker::widget(['model' => $model,
                'type' => DatePicker::TYPE_INPUT,

                'convertFormat' => true,
                'attribute' => $this->attribute,
                'options' => $this->filterInputOptions,
                'pluginOptions' => [
                    'format' => 'dd-MM-yyyy',
                    'autoclose' => true,
                    'weekStart' => 1,
                    'startDate' => '01-01-1930',
                    'endDate' => '01-01-2030',
                    'todayBtn' => 'linked',
                    'todayHighlight' => true,
                ]
            ]);

            return $dropDown . $field . $error;
        } else {
            return parent::renderFilterCellContent();
        }
    }
}