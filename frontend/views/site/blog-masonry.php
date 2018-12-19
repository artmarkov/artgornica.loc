<?php
/* @var $this yii\web\View */

use yii\widgets\LinkPager;
use yii\helpers\Url;
use yeesoft\helpers\Html;

$this->title = 'Blog';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="blog">
    <section class="container masonry-sidebar">
        <div class="row">
            <div class="col-md-9">
                <ul class="masonry-list">

                    <?php foreach ($posts as $post) : ?>
                        <?= $this->render('/items/post-masonry.php', ['post' => $post, 'page' => 'blog']) ?>

                    <?php endforeach; ?>

                </ul>

                <div class="clearfix"></div>

                <!-- PAGINATION -->
                <div class="text-center">
                    <?= LinkPager::widget(['pagination' => $pagination]) ?>
                </div>

            </div>

            <div class="col-md-3">


                <!-- blog search -->
                <div class="widget">

                    <h3>Поиск Блога</h3>

                    <form method="get" action="#" class="input-group">
                        <input type="text" class="form-control" name="k" id="k" value="" placeholder="search..." />
                        <span class="input-group-btn">
                            <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </span>
                    </form>
                </div>

                <!-- categories -->
                <div class="widget">

                    <h4><i class="fa fa-folder-open" aria-hidden="true"></i> Категории</h4>
                    <?php $menuCategory = \backend\modules\post\models\Category::getCategoriesMenu(); ?>
                    <ul class="nav nav-list">
                        <?php //echo '<pre>' . print_r($menuCategory, true) . '</pre>'; ?>
                        <?php foreach ($menuCategory as $slug => $title): ?>
                            <li>
                                <a href="<?= Url::to(['/category/index', 'slug' => $slug]) ?>"<i class="fa fa-circle-o"></i> <?= $title ?></a>

                            </li>
                        <?php endforeach; ?>
                    </ul>

                </div>

                <!-- recent posts -->
                <div class="widget">

                    <?php $tagcloud = \backend\modules\post\models\Tag::getTags() ?>
                    <?php // echo '<pre>' . print_r($tagcloud, true) . '</pre>'; ?>
                    <h4><i class="fa fa-tags" aria-hidden="true"></i> Облако тегов</h4>
                    <p class="fsize13"> 
                        <?php foreach ($tagcloud as $id => $slug): ?>
                            <!--fsize11 - fsize40-->
                            <?= Html::a('<i class="fa fa-tags" aria-hidden="true"></i> ' . $slug, ['/tag/index', 'slug' => $slug], ['class' => 'label label-primary light']) ?>

                        <?php endforeach; ?>
                    </p>

                </div>

            </div>

        </div>
    </section>

</div>
