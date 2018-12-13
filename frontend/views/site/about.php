<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <section id="about" class="container">
        <!-- Who Am I -->
        <article class="row">
            <div class="col-md-6">
                <div class="owl-carousel controlls-over" data-plugin-options='{"items": 1, "singleItem": true, "navigation": true, "pagination": true, "transitionStyle":"fadeUp"}'>
                    <div>
                        <img class="img-responsive" src="../frontend/web/images/demo/about_1.jpg" width="555" height="311" alt="">
                    </div>
                    <div>
                        <iframe src="http://player.vimeo.com/video/23630702" width="800" height="450"></iframe>
                    </div>
                    <div>
                        <img class="img-responsive" src="../frontend/web/images/demo/about_2.jpg" width="555" height="311" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3>Who Am I?</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>

                <hr />

                <ul class="list-icon star-o">
                    <li>Fully responsive so content looks great</li>
                    <li>Awesome sliders to showcase content</li>
                    <li>Amazing shortcodes loaded with options</li>
                </ul>

            </div>
        </article>
        <!-- /Who Am I -->

        <div class="divider"><!-- divider -->
            <i class="fa fa-star"></i>
        </div>

        <section id="portfolio">

            <div class="container">

                <h2><strong>Explore</strong> our gallery</h2>

                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet.</p>

                <ul class="nav nav-pills isotope-filter isotope-filter" data-sort-id="isotope-list" data-option-key="filter">
                    <li data-option-value="*" class="active"><a href="#">Show All</a></li>
                    <li data-option-value=".development"><a href="#">Development</a></li>
                    <li data-option-value=".photography"><a href="#">Photography</a></li>
                    <li data-option-value=".design"><a href="#">Design</a></li>
                </ul>


                <div class="row">

                    <ul class="sort-destination isotope fullcenter" data-sort-id="isotope-list">

                        <li class="isotope-item development"><!-- item -->
                            <div class="item-box">
                                <figure>
                                    <a class="item-hover" href="portfolio-single.html">
                                        <span class="overlay color2"></span>
                                        <span class="inner">
                                            <span class="block fa fa-plus fsize20"></span>
                                            <strong>VIEW</strong> PROJECT
                                        </span>
                                    </a>
                                    <img class="img-responsive" src="../frontend/web/images/demo/portfolio/scouter-600x403.jpg" width="260" height="260" alt="">
                                </figure>
                            </div>
                        </li>

                        <li class="isotope-item photography"><!-- item 2 -->
                            <div class="item-box">
                                <figure>
                                    <a class="item-hover lightbox" href="../frontend/web/images/demo/portfolio/black-kitty-600x403.jpg" data-plugin-options='{"type":"image"}'>
                                        <span class="overlay color2"></span>
                                        <span class="inner">
                                            <span class="block fa fa-plus fsize20"></span>
                                            <strong>VIEW</strong> IMAGE
                                        </span>
                                    </a>
                                    <img class="img-responsive" src="../frontend/web/images/demo/portfolio/black-kitty-600x403.jpg" width="260" height="260" alt="">
                                </figure>
                            </div>
                        </li>

                        <li class="isotope-item design"><!-- item 3 -->
                            <div class="item-box">
                                <figure>
                                    <a class="item-hover lightbox" href="http://www.youtube.com/watch?v=W7Las-MJnJo" data-plugin-options='{"type":"iframe"}'>
                                        <span class="overlay color2"></span>
                                        <span class="inner">
                                            <span class="block fa fa-plus fsize20"></span>
                                            <strong>VIEW</strong> VIDEO
                                        </span>
                                    </a>
                                    <img class="img-responsive" src="../frontend/web/images/demo/portfolio/merchant2-600x403.jpg" width="260" height="260" alt="">
                                </figure>
                            </div>
                        </li>

                        <li class="isotope-item photography"><!-- item 4 -->
                            <div class="item-box">
                                <figure>
                                    <a class="item-hover" href="portfolio-single.html">
                                        <span class="overlay color2"></span>
                                        <span class="inner">
                                            <span class="block fa fa-plus fsize20"></span>
                                            <strong>VIEW</strong> PROJECT
                                        </span>
                                    </a>
                                    <img class="img-responsive" src="../frontend/web/images/demo/portfolio/flippin-the-bird1-600x403.jpg" width="260" height="260" alt="">
                                </figure>
                            </div>
                        </li>

                        <li class="isotope-item development"><!-- item 5 -->
                            <div class="item-box">
                                <figure>
                                    <a class="item-hover lightbox" href="../frontend/web/images/demo/portfolio/night_to_remember1-600x403.jpg" data-plugin-options='{"type":"image"}'>
                                        <span class="overlay color2"></span>
                                        <span class="inner">
                                            <span class="block fa fa-plus fsize20"></span>
                                            <strong>VIEW</strong> IMAGE
                                        </span>
                                    </a>
                                    <img class="img-responsive" src="../frontend/web/images/demo/portfolio/night_to_remember1-600x403.jpg" width="260" height="260" alt="">
                                </figure>
                            </div>
                        </li>

                        <li class="isotope-item design"><!-- item 6 -->
                            <div class="item-box">
                                <figure>
                                    <a class="item-hover lightbox" href="http://www.youtube.com/watch?v=W7Las-MJnJo" data-plugin-options='{"type":"iframe"}'>
                                        <span class="overlay color2"></span>
                                        <span class="inner">
                                            <span class="block fa fa-plus fsize20"></span>
                                            <strong>VIEW</strong> VIDEO
                                        </span>
                                    </a>
                                    <img class="img-responsive" src="../frontend/web/images/demo/portfolio/spacebound-600x403.jpg" width="260" height="260" alt="">
                                </figure>
                            </div>
                        </li>

                        <li class="isotope-item photography design"><!-- item 7 -->
                            <div class="item-box">
                                <figure>
                                    <a class="item-hover" href="portfolio-single.html">
                                        <span class="overlay color2"></span>
                                        <span class="inner">
                                            <span class="block fa fa-plus fsize20"></span>
                                            <strong>VIEW</strong> PROJECT
                                        </span>
                                    </a>
                                    <img class="img-responsive" src="../frontend/web/images/demo/portfolio/be-my-guest1-600x403.jpg" width="260" height="260" alt="">
                                </figure>
                            </div>
                        </li>

                        <li class="isotope-item development"><!-- item 8 -->
                            <div class="item-box">
                                <figure>
                                    <a class="item-hover lightbox" href="../frontend/web/images/demo/portfolio/black-box5-600x403.jpg" data-plugin-options='{"type":"image"}'>
                                        <span class="overlay color2"></span>
                                        <span class="inner">
                                            <span class="block fa fa-plus fsize20"></span>
                                            <strong>VIEW</strong> IMAGE
                                        </span>
                                    </a>
                                    <img class="img-responsive" src="../frontend/web/images/demo/portfolio/black-box5-600x403.jpg" width="260" height="260" alt="">
                                </figure>
                            </div>
                        </li>

                        <li class="isotope-item development"><!-- item -->
                            <div class="item-box">
                                <figure>
                                    <a class="item-hover lightbox" href="http://www.youtube.com/watch?v=W7Las-MJnJo" data-plugin-options='{"type":"iframe"}'>
                                        <span class="overlay color2"></span>
                                        <span class="inner">
                                            <span class="block fa fa-plus fsize20"></span>
                                            <strong>VIEW</strong> VIDEO
                                        </span>
                                    </a>
                                    <img class="img-responsive" src="../frontend/web/images/demo/portfolio/weather-app-600x403.jpg" width="260" height="260" alt="">
                                </figure>
                            </div>
                        </li>

                        <li class="isotope-item photography"><!-- item 2 -->
                            <div class="item-box">
                                <figure>
                                    <a class="item-hover" href="portfolio-single.html">
                                        <span class="overlay color2"></span>
                                        <span class="inner">
                                            <span class="block fa fa-plus fsize20"></span>
                                            <strong>VIEW</strong> PROJECT
                                        </span>
                                    </a>
                                    <img class="img-responsive" src="../frontend/web/images/demo/portfolio/theMoose-600x403.jpg" width="260" height="260" alt="">
                                </figure>
                            </div>
                        </li>

                        <li class="isotope-item design"><!-- item 3 -->
                            <div class="item-box">
                                <figure>
                                    <a class="item-hover lightbox" href="../frontend/web/images/demo/portfolio/tumblr_mopqj9QUeq1st5lhmo1_12801-600x403.jpg" data-plugin-options='{"type":"image"}'>
                                        <span class="overlay color2"></span>
                                        <span class="inner">
                                            <span class="block fa fa-plus fsize20"></span>
                                            <strong>VIEW</strong> IMAGE
                                        </span>
                                    </a>
                                    <img class="img-responsive" src="../frontend/web/images/demo/portfolio/tumblr_mopqj9QUeq1st5lhmo1_12801-600x403.jpg" width="260" height="260" alt="">
                                </figure>
                            </div>
                        </li>

                        <li class="isotope-item photography"><!-- item 4 -->
                            <div class="item-box">
                                <figure>
                                    <a class="item-hover lightbox" href="http://www.youtube.com/watch?v=W7Las-MJnJo" data-plugin-options='{"type":"iframe"}'>
                                        <span class="overlay color2"></span>
                                        <span class="inner">
                                            <span class="block fa fa-plus fsize20"></span>
                                            <strong>VIEW</strong> VIDEO
                                        </span>
                                    </a>
                                    <img class="img-responsive" src="../frontend/web/images/demo/portfolio/scouter-600x403.jpg" width="260" height="260" alt="">
                                </figure>
                            </div>
                        </li>

                    </ul>

                </div><!-- /.masonry-container -->
            </div>

        </section>
        <div class="divider"><!-- divider -->
            <i class="fa fa-star"></i>
        </div>
        <!-- CALLOUT -->
        <section class="container">

            <div class="bs-callout text-center nomargin-bottom">
                <h3>Come on, let's work <strong>together</strong>! <a href="<?= \yii\helpers\Url::to('/contact') ?>" class="btn btn-primary btn-lg">Contact Me!</a></h3>
            </div>

        </section>
        <!-- /CALLOUT -->

    </section>


</div>
