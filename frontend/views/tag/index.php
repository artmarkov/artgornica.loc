<?php

use yii\widgets\LinkPager;

/* @var $this yii\web\View */

$this->title = '#' . $tag->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-tag">
    <section id="tag" class="container">
        <?php // if (Yii::$app->getRequest()->getQueryParam('page') <= 1) : ?>
        <!--            <div class="row">
                        <div class="pull-right col-md-6">    
                            <form method="get" action="#" class="input-group top-content-search">
                                <input type="text" class="form-control" name="k" id="k" value="" placeholder="поиск..."/>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </span>
                            </form>
                        </div>
                    </div>-->
        <?php // endif; ?>

        <?php foreach ($posts as $post) : ?>
            <?= $this->render('/items/post.php', ['post' => $post, 'page' => 'tag']) ?>
            <div class="divider"><!-- divider -->
                <i class="fa fa-star"></i>
            </div>
        <?php endforeach; ?>
        <div class="text-center">
            <?= LinkPager::widget(['pagination' => $pagination]) ?>
        </div>

    </section>
</div>
