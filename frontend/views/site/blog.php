<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\LinkPager;

$this->title = 'Blog';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-blog">
    <section id="blog" class="container">
        <?php if (Yii::$app->getRequest()->getQueryParam('page') <= 1) : ?>


            <form method="get" action="#" class="input-group top-content-search">
                <input type="text" class="form-control" name="k" id="k" value="" placeholder="search..."/>
						<span class="input-group-btn">
							<button class="btn btn-primary"><i class="fa fa-search"></i></button>
						</span>
            </form>

        <?php endif; ?>

        <div class="item">

            <?php /* @var $post yeesoft\post\models\Post */ ?>
            <?php foreach ($posts as $post) : ?>
                <div class="item">
                    <!-- article title -->
                    <div class="item-title">
                        <h2><a href="blog-post.html">This is an Image Post</a></h2>
                        <a href="blog.html" class="label label-default light"><i class="fa fa-dot-circle-o"></i>
                            Business</a>
                        <a href="blog-post.html#comments" class="scrollTo label label-default light"><i
                                class="fa fa-comment-o"></i> 3 Comments</a>
                        <span class="label label-default light">June 29, 2014</span>
                    </div>

                    <!-- image -->
                    <figure>
                        <img src="../frontend/web/images/demo/blog.jpg" class="img-responsive" alt="img"/>
                    </figure>

                    <?= $this->render('/items/post.php', ['post' => $post, 'page' => 'index']) ?>

                    <!-- read more button -->
                    <a href="blog-post.html" class="btn btn-xs"><i class="fa fa-sign-out"></i> READ MORE</a>

                </div>
                <!-- /blog item -->
            <?php endforeach; ?>

            <div class="text-center">
                <?= LinkPager::widget(['pagination' => $pagination]) ?>
            </div>

        </div>
    </section>
</div>
