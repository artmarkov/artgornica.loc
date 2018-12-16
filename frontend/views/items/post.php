<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yeesoft\comments\models\Comment;

/* @var $post yeesoft\post\models\Post */

$page = (isset($page)) ? $page : 'post';
?>

<div class="post clearfix">
    <!-- article title -->
    <header class="blog-post">
        <h1><?= $post->title ?></h1>
        <small class="fsize13">
            <?php if ($post->category): ?>

                <a href="<?= Url::to(['/category/index', 'slug' => $post->category->slug]) ?>" class="label label-default light">
                    <i class="fa fa-folder-open" aria-hidden="true"></i> <?= $post->category->title ?></a>
                    
            <?php endif; ?>

            <?php $tags = $post->tags; ?>
            <?php if (!empty($tags)): ?>
                <?php foreach ($tags as $tag): ?>
            
                    <?= Html::a('<i class="fa fa-tag" aria-hidden="true"></i> ' . $tag->title, ['/tag/index', 'slug' => $tag->slug], ['class' => 'label label-primary light']) ?>

                <?php endforeach; ?>
            <?php endif; ?>

            <span class="scrollTo label label-success light"><i class="fa fa-comment-o"></i> 
                <?php echo Comment::activeCount($post->className(), $post->id);?> Comments</span>
            <span class="label label-info light"><i class="fa fa-user" aria-hidden="true"></i> <?= $post->author->username ?>: <?= $post->publishedDate ?></span>
        </small>
    </header>
    
    <!-- carousel -->
    <div class="owl-carousel text-center controlls-over"
         data-plugin-options='{"items": 1, "singleItem": true, "navigation": true, "pagination": true, "autoPlay": true, "transitionStyle":"fadeUp"}'>
        <!-- transitionStyle: fade, backSlide, goDown, fadeUp,  -->
        <div class="item">
            <?= $post->getThumbnail(['class' => 'thumbnail pull-left', 'style' => 'width: 160px; margin: 0 7px 7px 0']) ?>
        </div>
    </div>
   
    <!-- article content -->
    <article>
        <p class="dropcap">
            <?= ($page === 'post') ? $post->content : $post->shortContent ?>
        </p>
    </article>
    <!-- read more button -->
    <?php if ($page != 'post'): ?>
        <?= Html::a('<i class="fa fa-sign-out"></i> БОЛЬШЕ', ["/site/{$post->slug}"], ['class' => 'btn btn-xs']) ?>
    <?php endif; ?>

</div>

