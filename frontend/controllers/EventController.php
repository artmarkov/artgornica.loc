<?php

namespace frontend\controllers;

use Yii;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;
use backend\modules\event\models\EventSchedule;

/**
 * Description of EventUserController
 *
 * @author markov-av
 */
class EventController extends \yeesoft\controllers\BaseController 
{
    
    /**
     * 
     * @return type
     * @throws NotFoundHttpException
     */
    public function actionIndex() {
        
        if (Yii::$app->user->isGuest) {
            throw new NotFoundHttpException(Yii::t('yii', 'Page not found.'));
        }

        $query = EventSchedule::find()
                ->innerJoin('event_schedule_users', 'event_schedule_users.schedule_id = event_schedule.id')
                ->where(['event_schedule_users.user_id' => Yii::$app->user->id]);

        $pagination = new Pagination([
            'totalCount' => $query->count(), 
            'defaultPageSize' => Yii::$app->settings->get('reading.page_size', 10)
            ]);
        $model = $query->orderBy('start_timestamp DESC')->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
                //echo '<pre>' . print_r($model, true) . '</pre>';
        return $this->render('index', compact('model', 'pagination'));
    }
    
    
    /**
     * 
     */
    public function actionViewEvent() {
        
         $this->layout = false;
        return $this->renderIsAjax('event-modal');
    }
    
    /**
     * 
     */
    public function actionView() {
         
        if (Yii::$app->user->isGuest) {
            throw new NotFoundHttpException(Yii::t('yii', 'Page not found.'));
        }
       
       $id = Yii::$app->request->get('id');
       
         $model = EventSchedule::find()
                ->innerJoin('event_schedule_users', 'event_schedule_users.schedule_id = event_schedule.id')
                ->where(['event_schedule_users.user_id' => Yii::$app->user->id])
                ->andWhere(['event_schedule.id' => $id])
                ->one();
         
         if(empty($model)) throw new NotFoundHttpException(Yii::t('yii', 'Page not found.'));
             
         
        return $this->render('event-view', compact('model'));
    }

}
