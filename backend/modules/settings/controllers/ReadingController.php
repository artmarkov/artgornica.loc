<?php

namespace backend\modules\settings\controllers;

/**
 * ReadingController implements Reading Settings page.
 *
 * @author Taras Makitra <makitrataras@gmail.com>
 */
class ReadingController extends SettingsBaseController
{
    public $modelClass = 'backend\modules\settings\models\ReadingSettings';
    public $viewPath = '@backend/modules/settings/views/reading/index';

}