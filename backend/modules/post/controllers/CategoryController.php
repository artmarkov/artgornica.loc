<?php

namespace backend\modules\post\controllers;
use backend\modules\post\models\Category;
use Yii;
/**
 * CategoryController implements the CRUD actions for backend\modules\post\models\Category model.
 */
class CategoryController extends \backend\controllers\DefaultController
{

    public $disabledActions = ['view', 'actions', 'bulk-deactivate'];

    public function init()
   {
       $this->modelClass = $this->module->categoryModelClass;
      // $this->modelSearchClass = $this->module->categoryModelSearchClass;
//
//        $this->indexView = $this->module->categoryIndexView;
//        $this->viewView = $this->module->categoryViewView;
//        $this->createView = $this->module->categoryCreateView;
//        $this->updateView = $this->module->categoryUpdateView;
//
        parent::init();
   }

    protected function getRedirectPage($action, $model = null)
    {
        switch ($action) {
            case 'update':
                return ['update', 'id' => $model->id];
                break;
            case 'create':
                return ['update', 'id' => $model->id];
                break;
            default:
                return parent::getRedirectPage($action, $model);
        }
    }
    /**
     * 
     * @return type
     */
    public function actionIndex()
    {
        //объект ActiveQuery содержащий данные для дерева. depth = 0 - корень.
        $query = Category::find()->where(['depth' => '0']);

        return $this->render('index', [
            'query' => $query,
        ]);
    }
    /**
     * 
     * @return type
     */
    public function actionCreate()
    {
    /** @var  $model Menu|NestedSetsBehavior */
    $model = new $this->modelClass();

    //Поиск корневого элемента
    $root = $model->find()->where(['depth' => '0'])->one();

    if ($model->load(Yii::$app->request->post())) {
        //Если нет корневого элемента (пустая таблица)
        if (!$root) {
            /** @var  $rootModel Menu|NestedSetsBehavior */
            $rootModel = new $this->modelClass(['title' => 'root', 'url' => '/']);
            $rootModel->makeRoot(); //делаем корневой
            $model->appendTo($rootModel);
        } else {
            $model->appendTo($root); //вставляем в конец корневого элемента
        }

        if ($model->save()){
            return $this->redirect('index');
        }
    }

    return $this->render('create', [
        'model' => $model,
        'root' => $root
    ]);
}

public function actions() {
    return [
        'nodeMove' => [
            'class' => 'klisl\nestable\NodeMoveAction',
            'modelName' => Category::className(),
        ],
    ];
}
}
