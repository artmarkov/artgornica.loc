<?php

namespace backend\modules\media\controllers;

class DefaultController extends \backend\controllers\DefaultController
{

    public $disabledActions = ['view', 'create', 'update', 'delete', 'toggle-attribute',
        'bulk-activate', 'bulk-deactivate', 'bulk-delete', 'grid-sort', 'grid-page-size'];

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSettings()
    {
        return $this->render('settings');
    }

}