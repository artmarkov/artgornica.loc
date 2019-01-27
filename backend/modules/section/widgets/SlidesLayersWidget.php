<?php
namespace backend\modules\section\widgets;

use yii\base\Widget;

/**
 * Description of ItemProgrammWidget
 *
 * @author artmarkov
 */
class SlidesLayersWidget extends Widget {
    
    public $model;

    public function run() {
  
        return $this->render('slidesLayers', [
                    'model' => $this->model
                    
        ]);
    }

}
