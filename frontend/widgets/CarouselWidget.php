<?php

namespace frontend\widgets;

use yii\base\Widget;

/**
 * Description of CarouselWidget
 *
 * @author artmarkov
 */
class CarouselWidget extends Widget {

    public $model;
    public $options;

    public function run() {

        return $this->render('carousel', [
                    'model' => $this->model,
                    'options' => $this->options,
        ]);
    }

}

