<?php

use yeesoft\comments\assets\CommentsAsset;
use yeesoft\comments\Comments;
use yii\helpers\Html;

/* @var $this yii\web\View */

$commentsAsset = CommentsAsset::register($this);
Comments::getInstance()->commentsAssetUrl = $commentsAsset->baseUrl;
?>

<div class="clearfix recent-comment">
    <div class="pull-left">
        <small class="fsize13">
            <span class="scrollTo label label-success light"><i class="fa fa-comment-o" aria-hidden="true"></i>
                <?= Html::encode($comment->getAuthor()); ?> <?= "{$comment->createdDate} {$comment->createdTime}" ?>
            </span>
        </small>
        <div>
            <p>            
                <?= $comment->shortContent ?>
                <br />
                 <?= Html::a('<i class="fa fa-sign-out"></i><span class="uppercase">' . Yii::t('yee', 'Read more...') . '</span>', ["/site{$comment->url}"], ['class' => 'btn btn-xs']) ?>
               
            </p> 
        </div>
    </div>
</div>