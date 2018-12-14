<?php
/* @var $this yii\web\View */

use yeesoft\comments\widgets\Comments;
use yeesoft\post\models\Post;

/* @var $post yeesoft\post\models\Post */

$this->title = $post->title;
$this->params['breadcrumbs'][] = $post->title;
?>
<div class="site-post">
    <section class="container">

        <div class="row">
            <div class="left col-md-12">

                <!-- article title -->
                <header class="blog-post">
                    <h1>This is a blog post</h1>
                    <small class="fsize13">
                        <a href="blog.html" class="label label-default light"><i class="fa fa-dot-circle-o"></i>
                            Business</a>
                        <a href="#comments" class="scrollTo label label-default light"><i class="fa fa-comment-o"></i> 3
                            Comments</a>
                        <span class="label label-default light">June 29, 2014</span>
                    </small>
                </header>

                <!-- carousel -->
                <div class="owl-carousel text-center controlls-over"
                     data-plugin-options='{"items": 1, "singleItem": true, "navigation": true, "pagination": true, "autoPlay": true, "transitionStyle":"fadeUp"}'>
                    <!-- transitionStyle: fade, backSlide, goDown, fadeUp,  -->
                    <div class="item">
                        <img src="../frontend/web/images/demo/screens/scr3.jpg" class="img-responsive" alt="img"/>
                    </div>
                    <div class="item">
                        <img src="../frontend/web/images/demo/screens/scr4.jpg" class="img-responsive" alt="img"/>
                    </div>
                </div>
                <hr>
                <!-- article content -->
                <article>
                    <p class="dropcap">Aliquam fringilla, sapien eget scelerisque placerat, lorem libero cursus lorem,
                        feugiat malesuada. Ut justo nulla, <strong>facilisis vel molestie id</strong>, dictum ut arcu.
                        Nunc ipsum nulla, eleifend non blandit quis, luctus quis orci. </p>

                    <p>Vivamus <a href="#">magna justo</a>, lacinia eget consectetur sed, convallis at tellus. Cras
                        ultricies ligula sed magna dictum porta. Curabitur aliquet quam id dui posuere blandit. Sed
                        ligula.
                        Nulla porttitor accumsan tincidunt.</p>

                    <!-- BLOCKQUOTE -->
                    <blockquote>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <cite>Source Title</cite>
                    </blockquote>

                     <p>Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta. Pellentesque in ipsum id
                        orci porta dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla porttitor
                        accumsan tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>


                <?= $this->render('/items/post.php', ['post' => $post]) ?>

                </article>

                <div class="divider"><!-- divider -->
                    <i class="fa fa-star"></i>
                </div>

                <!-- COMMENTS -->
                <div id="comments">

                    <?php if ($post->comment_status == Post::COMMENT_STATUS_OPEN): ?>
                        <?php echo Comments::widget(['model' => Post::className(), 'model_id' => $post->id]); ?>
                    <?php endif; ?>


                </div>
                <!-- /COMMENTS -->

            </div>
    </section>
</div>