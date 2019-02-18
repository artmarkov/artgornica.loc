<?php

namespace backend\modules\section\controllers;

use Yii;
use backend\controllers\DefaultController;
use backend\modules\section\models\ExampleModel;
use backend\modules\section\models\Item;

/**
 * DefaultController implements the CRUD actions for backend\modules\section\models\SectionPage model.
 */
class ExamplesController extends DefaultController
{
    public function actionIndex1() {
        $model = new ExampleModel;
       return $this->render('multiple-input', compact('model'));
    }
    public function actionIndex2() {
        $model = new ExampleModel;
       return $this->render('embedded-input', compact('model'));
    }
     public function actionIndex3() {
        $models = [new Item()];
       return $this->render('tabular-input', compact('models'));
    }
     public function actionIndex4() {
         $model = new ExampleModel;
       return $this->render('elfinder', compact('model'));
    }
}