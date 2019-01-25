<?php

namespace frontend\widgets;

use yii\base\Widget;

/**
 * Description of RevolutionSliderWidget
 *
 * @author artmarkov
 */
class RevolutionSliderWidget extends Widget {

    public $sliders;

    public function run() {

        return $this->render('revolutionSlider', [
                    'sliders' => $this->sliders
        ]);
    }

}
