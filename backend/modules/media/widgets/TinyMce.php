<?php

namespace backend\modules\media\widgets;

use backend\modules\media\assets\FileInputAsset;
use yeesoft\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\InputWidget;
use backend\modules\media\assets\TinyMceAsset;

class TinyMce extends InputWidget
{

    /**
     * @var string Optional, if set, only this image can be selected by user
     */
    public $thumb = '';

    /**
     * @var string JavaScript function, which will be called before insert file data to input.
     * Argument data contains file data.
     * data example: [alt: "Witch with cat", description: "123", url: "/uploads/2014/12/vedma-100x100.jpeg", id: "45"]
     */
    public $callbackBeforeInsert = '';

    /**
     * @var array the options for the TinyMCE JS plugin.
     * Please refer to the TinyMCE JS plugin Web page for possible options.
     * @see http://www.tinymce.com/wiki.php/Configuration
     */
    public $clientOptions = [
        'menubar' => false,
        'height' => 200,
        'image_dimensions' => true,
        'entity_encoding' => 'raw',
        'plugins' => [
            'advlist autolink lists link image charmap print preview anchor searchreplace visualblocks code contextmenu table wordcount pagebreak',
        ],
        'toolbar' => 'undo redo | styleselect bold italic | alignleft aligncenter alignright alignjustify bullist numlist outdent indent | pagebreak link image table | code',
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if (empty($this->clientOptions['file_picker_callback'])) {
            $this->clientOptions['file_picker_callback'] = new JsExpression(
                    'function(callback, value, meta) {
                    mediaTinyMCE(callback, value, meta);
                }'
            );
        }

        if (empty($this->clientOptions['document_base_url'])) {
            $this->clientOptions['document_base_url'] = '';
        }

        if (empty($this->clientOptions['convert_urls'])) {
            $this->clientOptions['convert_urls'] = false;
        }
    }

    /**
     * Runs the widget.
     */
    public function run()
    {
        if ($this->hasModel()) {
            $output = Html::activeTextarea($this->model, $this->attribute, $this->options);
        } else {
            $output = Html::textarea($this->name, $this->value, $this->options);
        }

        $this->registerClientScript();

        $modal = $this->renderFile('@backend/modules/media/views/manage/modal.php', [
            'inputId' => $this->options['id'],
            'btnId' => $this->options['id'] . '-btn',
            'frameId' => $this->options['id'] . '-frame',
            'frameSrc' => Url::to(['/media/manage']),
            'thumb' => $this->thumb,
        ]);

        return $output . $modal;
    }

    /**
     * Registers client scripts
     */
    protected function registerClientScript()
    {
        TinyMceAsset::register($this->view);
        FileInputAsset::register($this->view);

        $js = [];
        $id = $this->options['id'];

        $this->clientOptions['selector'] = "#{$id}";

        $options = Json::encode($this->clientOptions);
        $js[] = "tinymce.init($options);";

        $this->view->registerJs(implode("\n", $js));

        if (!empty($this->callbackBeforeInsert)) {
            $this->view->registerJs('
                $("#' . $this->options['id'] . '").on("fileInsert", ' . $this->callbackBeforeInsert . ');'
            );
        }
    }

}
