<?php

namespace frontend\controllers;

use frontend\actions\PageAction;
use frontend\actions\PostAction;
use common\models\Contact;
use yeesoft\page\models\Page;
use backend\modules\post\models\Post;
use Yii;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;
use backend\modules\event\models\EventSchedule;

/**
 * Site controller
 */
class SiteController extends \yeesoft\controllers\BaseController
{
    public $freeAccess = true;

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => '\frontend\components\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $queryPost = Post::find()->where(
                [
                    'status' => Post::STATUS_PUBLISHED, 
                    'main_flag' => Post::MAIN_ON
                ]);
        $countQuery = clone $queryPost;
        
        if($countQuery->count() < Post::COUNT_POST_INDEX) {
        $posts = Post::find()->where(['status' => Post::STATUS_PUBLISHED])
                ->orderBy('published_at DESC')
                ->limit(Post::COUNT_POST_INDEX)
                ->all();
        }
        else {
            $posts = $queryPost->orderBy('published_at DESC')
                ->limit(Post::COUNT_POST_INDEX)
                ->all();
        }
        
        $events = EventSchedule::find()
                //->where([''])
                ->orderBy('start_timestamp DESC')
                ->limit(EventSchedule::COUNT_EVENT_INDEX)
                ->all();
        return $this->render('index', [
                'posts' => $posts,
                'events' => $events,
            ]);
    }

    /**
     * Displays blog
     *
     * @return mixed
     */
    public function actionBlog($slug = 'blog')
    {
        // display home page
        if (empty($slug) || $slug == 'blog') {

            $query = Post::find()->where(['status' => Post::STATUS_PUBLISHED]);
            $countQuery = clone $query;

            $pagination = new Pagination([
                'totalCount' => $countQuery->count(),
                'defaultPageSize' => Yii::$app->settings->get('reading.page_size', 10),
            ]);

            $posts = $query->orderBy('published_at DESC')->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();

            return $this->render('blog-masonry', [
                'posts' => $posts,
                'pagination' => $pagination,
            ]);
        }

        //try to display action from controller
        try {
            return $this->runAction($slug);
        } catch (\yii\base\InvalidRouteException $ex) {

        }

        //try to display static page from datebase
        $page = Page::getDb()->cache(function ($db) use ($slug) {
            return Page::findOne(['slug' => $slug, 'status' => Page::STATUS_PUBLISHED]);
        }, 3);//3600

        if ($page) {
            $pageAction = new PageAction($slug, $this, [
                'slug'   => $slug,
                'page'   => $page,
                'view'   => $page->view,
                'layout' => $page->layout,
            ]);

            return $pageAction->run();
        }

        //try to display post from datebase
        $post = Post::getDb()->cache(function ($db) use ($slug) {
            return Post::findOne(['slug' => $slug, 'status' => Post::STATUS_PUBLISHED]);
        }, 3);//3600

        if ($post) {
            $postAction = new PostAction($slug, $this, [
                'slug'   => $slug,
                'post'   => $post,
                'view'   => $post->view,
                'layout' => $post->layout,
            ]);

            return $postAction->run();
        }

        //if nothing suitable was found then throw 404 error
        throw new \yii\web\NotFoundHttpException('Page not found.');
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new Contact();
        
        $model->scenario = 'contact';
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
           if ($model->sendEmail(Yii::$app->settings->get('general.email'))) {
                Yii::$app->session->setFlash('success', '<i class="fa fa-check-circle"></i>' . Yii::t('yee','Thank you for contacting us. We will respond to you as soon as possible.'));
            } else {
                Yii::$app->session->setFlash('error', '<i class="fa fa-frown-o"></i>' . Yii::t('yee','Thank you for contacting us. We will respond to you as soon as possible.'));
            }           
            $model->save();            
            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
}