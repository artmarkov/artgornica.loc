<?php
/* @var $this yii\web\View */

use yeesoft\comments\widgets\Comments;
use yeesoft\page\models\Page;
use yii\helpers\Html;

$this->title = $page->title;
$this->params['breadcrumbs'][] = $page->title;
?>
<div class="site-blog">
    <section id="blog" class="container">
        <div class="row">
            <div class="left col-md-12">          
                <?= $page->content ?>

                <div class="divider"><!-- divider -->
                    <i class="fa fa-star"></i>
                </div>

                <?php if ($page->comment_status == Page::COMMENT_STATUS_OPEN): ?>
                    <?php echo Comments::widget(['model' => Page::className(), 'model_id' => $page->id]); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>
