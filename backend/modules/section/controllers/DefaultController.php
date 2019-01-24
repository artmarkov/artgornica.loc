<?php

namespace backend\modules\section\controllers;

use yii\web\Controller;

/**
 * Default controller for the `block` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
