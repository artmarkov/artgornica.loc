<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>

        <!-- PAGE TITLE -->
        <header id="page-title">
            <div class="container">
                <h1><?= Html::encode($this->title) ?></h1>
                <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?>
            </div>
        </header>
<!--    <div class="site-about">-->

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

            <!-- SKILLS -->
            <div class="row">

                <div class="col-xs-6 col-md-3">
                    <div class="text-center">
                        <div class="circular-bar">
                            <input class="knob" data-linecap="round" data-bgColor="#FAFAFA" data-fgColor="#F07057" data-thickness=".06" value="87" data-readOnly="true" data-displayInput="false">
                            <div class="circular-bar-content">
                                <strong>HTML</strong>
                                <label>91%</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="text-center">
                        <div class="circular-bar">
                            <input class="knob" data-linecap="round" data-bgColor="#FAFAFA" data-fgColor="#F07057" data-thickness=".06" value="93" data-readOnly="true" data-displayInput="false">
                            <div class="circular-bar-content">
                                <strong>CSS</strong>
                                <label>93%</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-6 col-md-3">
                    <div class="text-center">
                        <div class="circular-bar">
                            <input class="knob" data-linecap="round" data-bgColor="#FAFAFA" data-fgColor="#F07057" data-thickness=".06" value="73" data-readOnly="true" data-displayInput="false">
                            <div class="circular-bar-content">
                                <strong>WORDPRESS</strong>
                                <label>73%</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="text-center">
                        <div class="circular-bar">
                            <input class="knob" data-linecap="round" data-bgColor="#FAFAFA" data-fgColor="#F07057" data-thickness=".06" value="61" data-readOnly="true" data-displayInput="false">
                            <div class="circular-bar-content">
                                <strong>PHOTOSHOP</strong>
                                <label>61%</label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /SKILLS -->


            <div class="divider"><!-- divider -->
                <i class="fa fa-star"></i>
            </div>


            <!-- WORK -->
            <section class="container">
                <h2>
                    Some of my <strong>best work</strong> is featured below.
                    <span class="subtitle">We've added over 36 new features! New layouts, short codes, theme options &amp; more!</span>
                </h2>

                <div class="row">

                    <div class="col-md-3"><!-- item 1 -->
                        <div class="item-box">
                            <figure>
                                <a class="item-hover" href="portfolio-single.html">
                                    <span class="overlay color2"></span>
										<span class="inner">
											<span class="block fa fa-plus fsize20"></span>
											<strong>PROJECT</strong> DETAIL
										</span>
                                </a>
                                <img class="img-responsive" src="../frontend/web/images/demo/portfolio/scouter-600x403.jpg" width="260" height="260" alt="">
                            </figure>
                            <div class="item-box-desc">
                                <h4>Atropos Project</h4>
                                <small class="styleColor">29 June, 2014</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3"><!-- item 2 -->
                        <div class="item-box">
                            <figure>
                                <a class="item-hover lightbox" href="http://www.youtube.com/watch?v=W7Las-MJnJo" data-plugin-options='{"type":"iframe"}'>
                                    <span class="overlay color2"></span>
										<span class="inner">
											<span class="block fa fa-plus fsize20"></span>
											<strong>VIEW</strong> VIDEO
										</span>
                                </a>
                                <img class="img-responsive" src="../frontend/web/images/demo/portfolio/black-kitty-600x403.jpg" width="260" height="260" alt="">
                            </figure>
                            <div class="item-box-desc">
                                <h4>Atropos Video</h4>
                                <small class="styleColor">29 June, 2014</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3"><!-- item 3 -->
                        <div class="item-box">
                            <figure>
                                <a class="item-hover lightbox" href="../frontend/web/images/demo/portfolio/merchant2-600x403.jpg" data-plugin-options='{"type":"image"}'>
                                    <span class="overlay color2"></span>
										<span class="inner">
											<span class="block fa fa-plus fsize20"></span>
											<strong>PROJECT</strong> DETAIL
										</span>
                                </a>
                                <img class="img-responsive" src="../frontend/web/images/demo/portfolio/merchant2-600x403.jpg" width="260" height="260" alt="">
                            </figure>
                            <div class="item-box-desc">
                                <h4>Atropos Image</h4>
                                <small class="styleColor">29 June, 2014</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3"><!-- item 4 -->
                        <div class="item-box">
                            <figure>
                                <a class="item-hover" href="portfolio-single.html">
                                    <span class="overlay color2"></span>
										<span class="inner">
											<span class="block fa fa-plus fsize20"></span>
											<strong>PROJECT</strong> DETAIL
										</span>
                                </a>
                                <img class="img-responsive" src="../frontend/web/images/demo/portfolio/flippin-the-bird1-600x403.jpg" width="260" height="260" alt="">
                            </figure>
                            <div class="item-box-desc">
                                <h4>Atropos Project</h4>
                                <small class="styleColor">29 June, 2014</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3"><!-- item 5 -->
                        <div class="item-box">
                            <figure>
                                <a class="item-hover lightbox" href="http://www.youtube.com/watch?v=W7Las-MJnJo" data-plugin-options='{"type":"iframe"}'>
                                    <span class="overlay color2"></span>
										<span class="inner">
											<span class="block fa fa-plus fsize20"></span>
											<strong>VIEW</strong> VIDEO
										</span>
                                </a>
                                <img class="img-responsive" src="../frontend/web/images/demo/portfolio/night_to_remember1-600x403.jpg" width="260" height="260" alt="">
                            </figure>
                            <div class="item-box-desc">
                                <h4>Atropos Video</h4>
                                <small class="styleColor">29 June, 2014</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3"><!-- item 6 -->
                        <div class="item-box">
                            <figure>
                                <a class="item-hover lightbox" href="../frontend/web/images/demo/portfolio/spacebound-600x403.jpg" data-plugin-options='{"type":"image"}'>
                                    <span class="overlay color2"></span>
										<span class="inner">
											<span class="block fa fa-plus fsize20"></span>
											<strong>PROJECT</strong> DETAIL
										</span>
                                </a>
                                <img class="img-responsive" src="../frontend/web/images/demo/portfolio/spacebound-600x403.jpg" width="260" height="260" alt="">
                            </figure>
                            <div class="item-box-desc">
                                <h4>Atropos Image</h4>
                                <small class="styleColor">29 June, 2014</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3"><!-- item 7 -->
                        <div class="item-box">
                            <figure>
                                <a class="item-hover" href="portfolio-single.html">
                                    <span class="overlay color2"></span>
										<span class="inner">
											<span class="block fa fa-plus fsize20"></span>
											<strong>PROJECT</strong> DETAIL
										</span>
                                </a>
                                <img class="img-responsive" src="../frontend/web/images/demo/portfolio/be-my-guest1-600x403.jpg" width="260" height="260" alt="">
                            </figure>
                            <div class="item-box-desc">
                                <h4>Atropos Project</h4>
                                <small class="styleColor">29 June, 2014</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3"><!-- item 8 -->
                        <div class="item-box">
                            <figure>
                                <a class="item-hover" href="portfolio-single.html">
                                    <span class="overlay color2"></span>
										<span class="inner">
											<span class="block fa fa-plus fsize20"></span>
											<strong>PROJECT</strong> DETAIL
										</span>
                                </a>
                                <img class="img-responsive" src="../frontend/web/images/demo/portfolio/black-box5-600x403.jpg" width="260" height="260" alt="">
                            </figure>
                            <div class="item-box-desc">
                                <h4>Atropos Project</h4>
                                <small class="styleColor">29 June, 2014</small>
                            </div>
                        </div>
                    </div>

                </div>

            </section>
            <!-- /WORK -->



            <!-- CALLOUT -->
            <section class="container">

                <div class="bs-callout text-center nomargin-bottom">
                    <h3>Come on, let's work <strong>together</strong>! <a href="contact-us.html" class="btn btn-primary btn-lg">Contact Me!</a></h3>
                </div>

            </section>
            <!-- /CALLOUT -->

        </section>


<!--</div>-->
