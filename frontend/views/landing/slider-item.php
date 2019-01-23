<?php

use yii\helpers\Html;

/* @var $slider comon\models\RevolutionSlider */
?>
<!-- SLIDER -->
<li data-transition="fade" data-slotamount="7" data-masterspeed="300">
    <img src="../frontend/web/images/dummy.png" alt=""
         data-lazyload="<?= $slider->slide_image ?>" data-fullwidthcentering="on">

    <div class="tp-caption medium_text lft"
         data-x="90"
         data-y="180"
         data-speed="300"
         data-start="500"
         data-easing="easeOutExpo"><?= $slider->banner_top ?>
    </div>

    <div class="tp-caption large_text lfb"
         data-x="90"
         data-y="222"
         data-speed="300"
         data-start="800"
         data-easing="easeOutExpo"><?= $slider->banner_middle ?>
    </div>

    <div class="tp-caption lfb"
         data-x="90"
         data-y="330"
         data-speed="300"
         data-start="1100"
         data-easing="easeOutExpo">

        <?= Html::a('<i class="' . $slider->btn_icon . '"></i>' . Yii::t('yee/landing', '' . $slider->btn_name . '') . '</span>', [$slider->url], ['class' => '' . $slider->btn_class . '']) ?>

    </div>
</li>
