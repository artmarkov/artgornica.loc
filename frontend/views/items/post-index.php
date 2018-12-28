<?php

use yii\helpers\Html;

/* @var $post backend\modules\post\models\Post */
?>
<div class="col-md-4 col-sm-6 col-xs-12">
    <!-- item -->
    <div class="item-box appear-animation pull-left inner" data-animation="fadeInDown">
        <figure>

            <img alt="" class="img-responsive" src="../frontend/web/images/demo/home/church_thumb_1.jpg"
                 width="409" height="271"/>
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