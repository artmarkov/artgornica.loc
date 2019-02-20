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
        <div class="avatar">
            <img src="<?= Comments::getInstance()->renderUserAvatar($comment->user_id) ?>"/>
        </div>
        <div class="content">
            <div class="header">
                <span class="scrollTo label label-info light"><i class="fa fa-user" aria-hidden="true"></i>
                    <?= Html::encode($comment->getAuthor()); ?> <?= "{$comment->createdDate} {$comment->createdTime}" ?>
                </span>
            </div>           
            <div class="text">

                <?= $comment->shortContent ?>
                <br />
                <?= Html::a('<i class="fa fa-sign-out"></i><span class="uppercase">' . Yii::t('yee', 'Read more...') . '</span>', ["/site{$comment->url}"], ['class' => 'btn btn-xs btn-comment']) ?>

            </div>
        </div>
    </div>
</div>

