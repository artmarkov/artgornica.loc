<?php

use yii\helpers\Html;

/* @var $post backend\modules\post\models\Post */
?>
<div class="col-md-4 col-sm-6">
    <!-- item -->
    <div class="item-box appear-animation pull-left inner" data-animation="fadeInDown">
        <figure>
            <?php
            $item = \backend\modules\mediamanager\models\MediaManager::getMediaFirst($post->formName(), $post->id);             
            if(!empty($item)) echo Html::img(\backend\modules\media\models\Media::findById($item['media_id'])->getThumbs()['medium'], ['class' => 'img-responsive', 'alt' => '']); 
            ?>
        </figure>
        <div class="item-box-desc">
            <h4><?= '<span class="uppercase">' . $post->title . '</span>' ?></h4>

            <?= $post->shortContent ?>
            <!-- read more button -->
            <p></p>
            <?= Html::a('<i class="fa fa-sign-out"></i><span class="uppercase">' . Yii::t('yee', 'Read more...') . '</span>', ["/site/{$post->slug}"], ['class' => 'btn btn-primary btn-xs']) ?>
        </div>
    </div>
    <!-- /item -->
</div>