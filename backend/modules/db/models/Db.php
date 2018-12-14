<?php
namespace backend\modules\db\models;

use Yii;
use yii\base\Model;
use yii\helpers\FileHelper;
use yii\helpers\StringHelper;

class Db extends Model{

    public function getFiles($files){
        //кол-во файлов сохраняем для использования в виджете
        Yii::$app->params['count_db'] = count($files);
        $arr = array();
        foreach($files as $key => $file){
            $arr[] = array(
                'dump' =>$file,
                'size' =>Yii::$app->formatter->asSize(filesize($file)),
                'create_at' =>Yii::$app->formatter->asDatetime(filectime($file)),
                'type' => pathinfo($file, PATHINFO_EXTENSION),
            );
        }
        $dataProvider = new \yii\data\ArrayDataProvider([
            'allModels' => $arr,
            'sort' => [
                'attributes' => ['dump','size','create_at'],
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $dataProvider;
    }


    public function import($path) {
        if (file_exists($path)) {
            $path = \yii\helpers\Html::encode($path);
            $db = Yii::$app->getDb();
            if (!$db) {
                Yii::$app->session->setFlash('crudMessage', 'Нет подключения к базе данных.');
            }
            //Экранируем скобку которая есть в пароле
            $db->password = str_replace("(","\(",$db->password);
            exec('mysql --host=' . $this->getDsnAttribute('host', $db->dsn) . ' --user=' . $db->username . ' --password=' . $db->password . ' ' . $this->getDsnAttribute('dbname', $db->dsn) . ' < ' . $path);
            Yii::$app->session->setFlash('crudMessage', 'Дамп ' . $path . ' успешно импортирован.');
        } else {
            Yii::$app->session->setFlash('crudMessage', 'Указанный путь не существует.');
        }
        return Yii::$app->response->redirect(['db/default/index']);
    }


    public function export($path = null) {
        $path = FileHelper::normalizePath(Yii::getAlias($path));
        if (file_exists($path)) {
            if (is_dir($path)) {
                if (!is_writable($path)) {
                    Yii::$app->session->setFlash('crudMessage', 'Дирректория не доступна для записи.');
                    return Yii::$app->response->redirect(['db/default/index']);
                }
                $fileName = 'dump_' . date('Y_m_d_H_i_s') . '.sql';
                $filePath = $path . DIRECTORY_SEPARATOR . $fileName;
                $db = Yii::$app->getDb();
                if (!$db) {
                    Yii::$app->session->setFlash('crudMessage', 'Нет подключения к базе данных.');
                    return Yii::$app->response->redirect(['db/default/index']);
                }
                //Экранируем скобку которая есть в пароле
                $db->password = str_replace("(","\(",$db->password);
                exec('mysqldump --host=' . $this->getDsnAttribute('host', $db->dsn) . ' --user=' . $db->username . ' --password=' . $db->password . ' ' . $this->getDsnAttribute('dbname', $db->dsn) . ' --skip-add-locks > ' . $filePath);
                Yii::$app->session->setFlash('crudMessage', 'Экспорт успешно завершен. Файл "'.$fileName.'" в папке ' . $path);
            } else {
                Yii::$app->session->setFlash('crudMessage', 'Путь должен быть папкой.');
            }
        } else {
            Yii::$app->session->setFlash('crudMessage', 'Указанный путь не существует.');
        }
        return Yii::$app->response->redirect(['db/default/index']);
    }


    //Возвращает название хоста (например localhost)
    private function getDsnAttribute($name, $dsn) {
        if (preg_match('/' . $name . '=([^;]*)/', $dsn, $match)) {
            return $match[1];
        } else {
            return null;
        }
    }


    public function delete($path) {
        if (file_exists($path)) {
            $path = \yii\helpers\Html::encode($path);
            unlink($path);
            Yii::$app->session->setFlash('crudMessage', 'Дамп БД удален.');
        } else {
            Yii::$app->session->setFlash('crudMessage', 'Указанный путь не существует.');
        }
        return Yii::$app->response->redirect(['db/default/index']);
    }

    public function download($path) {
        if (file_exists($path)) {
            $path = \yii\helpers\Html::encode($path);
          return  Yii::$app->response->sendFile($path);
        } else {
            Yii::$app->session->setFlash('crudMessage', 'Указанный путь не существует.');
        }
        return Yii::$app->response->redirect(['db/default/index']);
    }
}