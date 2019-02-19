<?php

namespace backend\modules\db\controllers;


use yeesoft\controllers\admin\BaseController;
use Yii;
use yii\web\Controller;
use yii\helpers\FileHelper;
use backend\modules\db\models\Db;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;

class DefaultController extends BaseController {

    public $layout = '@backend/views/layouts/main.php';
    
    //Путь к файлам БД по-умолчанию
    public $dumpPath = '@frontend/web/db/';

    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post','get'],
                ],
            ],
        ]);
    }
    public function actionIndex($path = null){
        //Получаем массива путей к файлам с дампом БД (.sql)         
        $path = FileHelper::normalizePath(Yii::getAlias($this->dumpPath));
        $files = FileHelper::findFiles($path, ['only' => ['*.sql'], 'recursive' => FALSE]);
        $model = new Db();
        //Метод формирует массив в нужный для виджета GridView формат с пагинацией
        $dataProvider = $model->getFiles($files);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionImport($path) {
        $model = new Db();
        //Метод делает импорт дампа БД
        $model->import($path);
    }
    public function actionExport($path = null) {
        $path = $path ? : $this->dumpPath;
        $model = new Db();
        //Метод экспортирует данные из БД в указанную папку
        $model->export($path);
    }
    public function actionDelete($path) {
        $model = new Db();
        //Метод удаляет дамп БД
        $model->delete($path);
    }
    public function actionDownload($path)
    {
        $model = new Db();
        //Метод скачавает дамп БД
        $model->download($path);
    }
}