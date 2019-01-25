<?php

namespace frontend\widgets;

use yii\base\Widget;

/**
 * Description of parallaxWidget
 *
 * @author artmarkov
 */
class parallaxWidget extends Widget {

    public $parallax;

    public function run() {

        return $this->render('parallax', [
                    'parallax' => $this->parallax
        ]);
    }

}

