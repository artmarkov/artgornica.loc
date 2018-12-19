<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yeesoft\comments\models\Comment;

/* @var $post yeesoft\post\models\Post */

$page = (isset($page)) ? $page : 'post';
?>
<li class="masonry-item">
<!-- article title -->
<div class="item">
<!-- article title -->
<div class="item-title">
    <h2><?= $post->title ?></h2>
  
        <?php if ($post->category): ?>

            <a href="<?= Url::to(['/category/index', 'slug' => $post->category->slug]) ?>" class="label label-default light">
                <i class="fa fa-folder-open" aria-hidden="true"></i> <?= $post->category->title ?></a>

        <?php endif; ?>

        <span class="scrollTo label label-success light"><i class="fa fa-comment-o"></i> 
            <?php echo Comment::activeCount($post->className(), $post->id); ?> Comments</span>
        <span class="label label-info light"><i class="fa fa-user" aria-hidden="true"></i> <?= $post->author->username ?>: <?= $post->publishedDate ?></span>
    </div>

<!-- image -->
<figure>
    
    <?= Html::img('../frontend/web/images/demo/screens/scr4.jpg', ['alt' => 'img', 'class' => 'img-responsive']) ?>
</figure>
<!-- TAGS -->
<?php $tags = $post->tags; ?>
<?php if (!empty($tags)): ?>
    <p class="fsize13 nopadding-bottom"> 
        <?php foreach ($tags as $tag): ?>

            <?= Html::a('<i class="fa fa-tags" aria-hidden="true"></i> ' . $tag->title, ['/tag/index', 'slug' => $tag->slug], ['class' => 'label label-primary light']) ?>

        <?php endforeach; ?>
    </p>
<?php endif; ?>

    <?=  $post->shortContent ?>
<div>
    
<!-- read more button -->
<?php if ($page != 'post'): ?>
    <?= Html::a('<i class="fa fa-sign-out"></i>' . Yii::t('yee/post', 'READ MORE'), ["/site/{$post->slug}"], ['class' => 'btn btn-xs']) ?>
<?php endif; ?>
</div>

</div>
</li>