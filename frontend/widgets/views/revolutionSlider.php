 <?//php echo '<pre>' . print_r($sliders, true) . '</pre>';  ?>
<!-- REVOLUTION SLIDER -->
<div class="fullwidthbanner-container roundedcorners">
    <div class="fullwidthbanner">
        <ul>
            <?php foreach ($sliders as $slider) : ?>

                <?= $this->render('/section/slider-item.php', ['slider' => $slider]) ?>

            <?php endforeach; ?>

        </ul>
        <div class="tp-bannertimer"></div>
    </div>
</div>
<!-- /REVOLUTION SLIDER -->

