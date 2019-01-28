<?php

use yeesoft\helpers\Html;
?> 
<!-- carousel -->
<div class="<?= $carousel->plugin_class ?>"
     data-plugin-options='<?= $carousel->plugin_option ?>'>
    <div>
        <img  class="<?= $carousel->img_class ?>" src="../frontend/web/images/demo/home/church_slider_1.jpg" width="<?= $carousel->img_width ?>" height="<?= $carousel->img_height ?>" alt="">
    </div>
    <div>
        <img  class="<?= $carousel->img_class ?>" src="../frontend/web/images/demo/home/church_slider_3.jpg" width="<?= $carousel->img_width ?>" height="<?= $carousel->img_height ?>" alt="">
    </div>
    <div>
        <img  class="<?= $carousel->img_class ?>" src="../frontend/web/images/demo/home/church_slider_2.jpg" width="<?= $carousel->img_width ?>" height="<?= $carousel->img_height ?>" alt="">
    </div>
</div>
<!-- /carousel -->