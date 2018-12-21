<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yeesoft\comments\models\Comment;

/* @var $post yeesoft\post\models\Post */

$page = (isset($page)) ? $page : 'post';
$post->updateRevision();
?>

<!-- article title -->
<header class="blog-post">
    <h1><?= $post->title ?></h1>
    <small class="fsize13">
        <?php if ($post->category): ?>

            <a href="<?= Url::to(['/category/index', 'slug' => $post->category->slug]) ?>" class="label label-default light">
                <i class="fa fa-folder-open" aria-hidden="true"></i> <?= $post->category->title ?></a>

        <?php endif; ?>

        <span class="scrollTo label label-success light"><i class="fa fa-comment-o"></i> 
            <?php echo Comment::activeCount($post->className(), $post->id); ?> Comments</span>
        <span class="label label-info light"><i class="fa fa-user" aria-hidden="true"></i> <?= $post->author->username ?>: <?= $post->publishedDate ?></span>
    </small>
</header>

<?php if ($page === 'post'): ?>
    <!-- carousel -->
    <div class="owl-carousel text-center controlls-over" data-plugin-options='{"items": 1, "singleItem": true, "navigation": true, "pagination": true, "autoPlay": true, "transitionStyle":"fadeUp"}'><!-- transitionStyle: fade, backSlide, goDown, fadeUp,  -->
        <div class="item">
            <img src="../frontend/web/images/demo/screens/scr3.jpg" class="img-responsive" alt="img" />
        </div>
        <div class="item">
            <img src="../frontend/web/images/demo/screens/scr4.jpg" class="img-responsive" alt="img" />
        </div>
    </div>
    <!-- carousel -->
<?php else: ?>
    
    <?= Html::img('../frontend/web/images/demo/screens/scr4.jpg', ['alt' => 'img', 'class' => 'img-responsive']) ?>

<?php endif; ?>
    <!-- TAGS -->
<?php $tags = $post->tags; ?>
<?php if (!empty($tags)): ?>
    <p class="fsize13 nopadding-bottom nopadding-top"> 
        <?php foreach ($tags as $tag): ?>

            <?= Html::a('<i class="fa fa-tags" aria-hidden="true"></i> ' . $tag->title, ['/tag/index', 'slug' => $tag->slug], ['class' => 'label label-primary light']) ?>

        <?php endforeach; ?>
    </p>
<?php endif; ?>
<!-- article content -->
<article>

    <?=  $post->allContent ?>

</article>



