<?php

namespace frontend\widgets;

use yii\base\Widget;

/**
 * Description of CarouselWidget
 *
 * @author artmarkov
 */
class CarouselWidget extends Widget {

    public $carousel;

    public function run() {

        return $this->render('carousel', [
                    'carousel' => $this->carousel
        ]);
    }

}

