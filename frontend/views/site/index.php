<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\LinkPager;

?>
<div class="site-index">
<!-- REVOLUTION SLIDER -->
    <div class="fullwidthbanner-container roundedcorners">
        <div class="fullwidthbanner">
            <ul>
                <!-- SLIDER -->
                <li data-transition="fade" data-slotamount="7" data-masterspeed="300">
                    <img src="../frontend/web/images/dummy.png" alt="church3"
                         data-lazyload="../frontend/web/images/forest-3119826_1920.jpg" data-fullwidthcentering="on">

                    <div class="tp-caption medium_text lft"
                         data-x="90"
                         data-y="180"
                         data-speed="300"
                         data-start="500"
                         data-easing="easeOutExpo">Жизнь - это счастье!
                    </div>

                    <div class="tp-caption large_text lfb"
                         data-x="90"
                         data-y="222"
                         data-speed="300"
                         data-start="800"
                         data-easing="easeOutExpo">Любовь к жизни, осознанная жизнь <br/> дают ощущение счастья!
                    </div>

                    <div class="tp-caption lfb"
                         data-x="90"
                         data-y="330"
                         data-speed="300"
                         data-start="1100"
                         data-easing="easeOutExpo">
                        <a href="#"
                           target="_blank" class="btn btn-primary btn-lg">Записаться на занятие <i
                                class="fa fa-chevron-circle-right"></i></a>
                    </div>
                </li>

                <!-- SLIDER -->
                <li data-transition="fade" data-slotamount="7" data-masterspeed="300">
                    <img src="../frontend/web/images/dummy.png" alt="church1"
                         data-lazyload="../frontend/web/images/wallpaper-1492818_1920.jpg" data-fullwidthcentering="on">

                    <div class="tp-caption medium_text lft"
                         data-x="90"
                         data-y="180"
                         data-speed="300"
                         data-start="500"
                         data-easing="easeOutExpo">Позитивный мир начинается с себя!
                    </div>

                    <div class="tp-caption large_text lfb"
                         data-x="90"
                         data-y="222"
                         data-speed="300"
                         data-start="800"
                         data-easing="easeOutExpo">В нашем подсознании скрыта сила,<br/>способная перевернуть мир.
                    </div>

                    <div class="tp-caption lfb"
                         data-x="90"
                         data-y="330"
                         data-speed="300"
                         data-start="1100"
                         data-easing="easeOutExpo">
                        <a href="#"
                           target="_blank" class="btn btn-default btn-lg">Записаться на встречу</a>
                    </div>
                </li>

                <!-- SLIDER -->
                <li data-transition="fade" data-slotamount="7" data-masterspeed="300">
                    <img src="../frontend/web/images/dummy.png" alt="church2"
                         data-lazyload="../frontend/web/images/sunset-silhouette-2081796_1920.jpg" data-fullwidthcentering="on">

                    <div class="tp-caption medium_text lft"
                         data-x="90"
                         data-y="180"
                         data-speed="300"
                         data-start="500"
                         data-easing="easeOutExpo">Станьте творцом своей жизни!
                    </div>

                    <div class="tp-caption large_text lfb"
                         data-x="90"
                         data-y="222"
                         data-speed="300"
                         data-start="800"
                         data-easing="easeOutExpo">Любите и проявляйте себя. <br/> Сделайте это прямо сейчас!
                    </div>

                    <div class="tp-caption lfb"
                         data-x="90"
                         data-y="330"
                         data-speed="300"
                         data-start="1100"
                         data-easing="easeOutExpo">
                        <a href="#"
                           target="_blank" class="btn btn-info btn-lg">ЧИТАТЬ ДАЛЕЕ...</a>
                    </div>
                </li>

            </ul>
            <div class="tp-bannertimer"></div>
        </div>
    </div>
    <!-- /REVOLUTION SLIDER -->
    <!-- WELCEOME -->
    <section id = "welcome" class="container">
        <h1 class="text-center">
            <strong>Добро пожаловать</strong> в студию Елены Ишановой "Артгорница"
        </h1>

        <h2 class="text-center">30 ВСТРЕЧ - ПУТЬ К ПОИСКУ СЕБЯ!</h2>

        <div class="divider styleColor"><!-- divider -->
            <i class="fa fa-leaf"></i>
        </div>

        <p>Курс <a href="">"30 встреч"</a> помогает познать себя и окружающий мир, раскрыть в себе новые способности,
            не бояться изменять свою жизнь, осознать свою способность быть счастливым и делиться этим счастьем с
            другими!
        </p>
       <div class="divider"><!-- divider -->
        </div>
    </section>
    <!-- /WELCOME -->

        <!-- Positive -->
        <section class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>
                        <strong class="styleColor">Для кого </strong>Этот курс? 
                    </h2>	
                        <ul class="list-icon star color">
                                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas metus nulla, commodo a sodales sed, dignissim pretium nunc.</li>
                                <li>Duis mollis, est non commodo</li>
                                <li>Maecenas sed diam eget</li>
                                <li>Nullam id dolor id</li>
                                <li>Duis mollis, est non commodo</li>
                                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas metus nulla, commodo a sodales sed, dignissim pretium nunc.</li>
                        </ul>
                    <a class="btn btn-primary btn-lg" href="shortcodes-rows.html">Записаться на курс</a>
                </div>

                <div class="col-md-6">

                    <!-- carousel -->
                    <div class="owl-carousel controlls-over"
                         data-plugin-options='{"items": 1, "singleItem": true, "navigation": true, "pagination": true, "transitionStyle":"fadeUp"}'>
                        <div>
                            <img alt="" class="img-responsive" src="../frontend/web/images/demo/home/church_slider_1.jpg">
                        </div>
                        <div>
                            <img alt="" class="img-responsive" src="../frontend/web/images/demo/home/church_slider_3.jpg">
                        </div>
                        <div>
                            <img alt="" class="img-responsive" src="../frontend/web/images/demo/home/church_slider_2.jpg">
                        </div>
                    </div>
                    <!-- /carousel -->

                </div>
            </div>
        </section>
        <!-- /Positive -->

        <div class="divider"><!-- divider -->
            <i class="fa fa-leaf"></i>
        </div>

    <!-- POST -->
        <section id = "post" class="container">
                <h2>
                        <strong class="styleColor">Это </strong>Интересно
                </h2>
            <div class="row text-center">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <!-- item -->
                    <div class="item-box appear-animation pull-left inner" data-animation="fadeInLeft">
                        <figure>
                            
                            <img alt="" class="img-responsive" src="../frontend/web/images/demo/home/church_thumb_1.jpg"
                                 width="409" height="271"/>
                        </figure>
                        <div class="item-box-desc">
                            <h4>КАК ПЕРЕСТАТЬ КОНТРОЛИРОВАТЬ?</h4>

                            <p>Многие из нас привыкли контролировать себя и своих близких, контролировать каждый шаг.
                                Контроль начинается тогда, когда мы стремимся изменить мир, чтобы он соответствовал
                                нашим
                                желаниям. Контроль - это следствие недоверия к жизни и недоверия к людям.
                                Мы злимся и раздражаемся, испытываем тревогу за ожидаемое событие будущего.
                               </p>
                               <a href="#" class="btn btn-primary btn-xs">ЧИТАТЬ ДАЛЕЕ...</a>
                        </div>
                    </div>
                    <!-- /item -->

                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">

                    <!-- item -->
                    <div class="item-box appear-animation pull-left inner" data-animation="fadeInDown">
                        <figure>
                            
                            <img alt="" class="img-responsive" src="../frontend/web/images/demo/home/church_thumb_2.jpg"
                                 width="409" height="271"/>
                        </figure>
                        <div class="item-box-desc">
                            <h4>ХОЧЕШЬ БЫТЬ ХОРОШИМ?</h4>

                            <p>В жизни возникают ситуации, когда мы почему-то соглашаемся помочь,
                                но при этом в душе мы не хотим выполнить просьбу или просьба расходится с нашими
                                интересами. Почему нам так сложно сказать слово «нет»?
                                Почему мы не ценим свое время? Почему, выполнив просьбу, мы задумываемся о том,
                                насколько нас уважают и ценят другие люди? Почему для нас важно чувствовать себя
                                востребованным и ценным?</p>
                            <a href="#" class="btn btn-primary btn-xs">ЧИТАТЬ ДАЛЕЕ...</a>
                        </div>
                    </div>
                    <!-- /item -->

                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">

                    <!-- item -->
                    <div class="item-box appear-animation pull-left inner" data-animation="fadeInRight">
                        <figure>

                            <img alt="" class="img-responsive" src="../frontend/web/images/demo/home/church_thumb_3.jpg"
                                 width="409" height="271"/>
                        </figure>
                        <div class="item-box-desc">
                            <h4>Я СЧАСТЛИВ НА СВОЕЙ РАБОТЕ!</h4>

                            <p>Многие ли из нас могут так сказать? Часто люди жалуются, что работать тяжело, что их
                                не ценят и не повышают в должности! Но кто из этих людей регулярно занимается
                                самообразованием? Учеными установлено, что образование и обучение чему-то новому,
                                физическая и умственная активность являются инструментом восстановления нервных клеток
                                или «нейрогенезом», что способствует сохранению качества жизни.
                               </p>
                            <a href="#" class="btn btn-primary btn-xs">ЧИТАТЬ ДАЛЕЕ...</a>
                        </div>
                    </div>
                    <!-- /item -->

                </div>

            </div>
        </section>
    <!-- /POST -->

        <div class="divider  styleColor"><!-- divider -->
            <i class="fa fa-leaf"></i>
        </div>

    <!-- PARALLAX -->
    <div style="background: #000;" >
        <section id="paralax" class="parallax delayed" data-stellar-background-ratio="0.8"
                 style="background-image: url('../frontend/web/images/tree-736877_1280-1.jpg');">
            <!--<span class="overlay"></span>-->

            <div class="container">

                <div class="row">
                    <!-- left content -->
                    <div class="col-md-7 animation_fade_in">
                        <h2>Позитивный мир  <strong>Начинается с себя!</strong></h2>

                        <p class="lead">
                            Сделайте шаг к переменам в своей жизни прямо сейчас!
                        </p>

                        <p>
                            Почувствовать вкус к жизни и найти дорогу к Вашим целям поможет мой авторский курс<br />«30 встреч» -
                            Путь к Поиску Себя! Благодаря взаимодействию с арт-терапией Вы осознаете, что можно жить без
                            лишних переживаний! Вы узнаете, как сохранить жизненные силы и где найти ресурсы!
                        </p>

                        <a class="btn btn-primary btn-lg" href="#">Записаться на курс</a>
                    </div>

                    <!-- right image -->
                    <div class="col-md-5 animation_fade_in">
                        <img class="visible-md visible-lg img-responsive pull-right" src="">
                    </div>
                </div>
            </div>

        </section>
    </div>
    <!-- PARALLAX -->

    <!-- PORTFOLIO -->
    <section id="portfolio" class="special-row padding100  margin-footer">
        <div class="container">
            <h2><strong>Ближайшие</strong> Занятия</h2>
            <div class="row">

                <div class="col-md-3"><!-- item 1 -->
                    
                        <div class="item-box appear-animation pull-left inner" data-animation="fadeInLeft">
                        <figure>
                            <a class="item-hover" href="">
                                <span class="overlay color2"></span>
                                <span class="inner">
                                    <span class="block fa fa-plus fsize20"></span>
                                    <strong>ДЕТАЛИ</strong> ЗАНЯТИЯ
                                </span>
                            </a>
                            <img class="img-responsive" src="../frontend/web/images/demo/portfolio/scouter-600x403.jpg" width="260" height="260" alt="">
                        </figure>
                        <div class="item-box-desc">
                            <h4>Как стать счастливее?</h4>
                            <small class="styleColor">29 June, 2014</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-3"><!-- item 2 -->
                    <div class="item-box appear-animation pull-left inner" data-animation="fadeInUp">
                        <figure>
                            <a class="item-hover lightbox" href="http://www.youtube.com/watch?v=W7Las-MJnJo" data-plugin-options='{"type":"iframe"}'>
                                <span class="overlay color2"></span>
                                <span class="inner">
                                    <span class="block fa fa-plus fsize20"></span>
                                    <strong>ДЕТАЛИ</strong> ЗАНЯТИЯ
                                </span>
                            </a>
                            <img class="img-responsive" src="../frontend/web/images/demo/portfolio/black-kitty-600x403.jpg" width="260" height="260" alt="">
                        </figure>
                        <div class="item-box-desc">
                            <h4>Как Вы относитесь к деньгам?</h4>
                            <small class="styleColor">29 June, 2014</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-3"><!-- item 3 -->
                    <div class="item-box appear-animation pull-left inner" data-animation="fadeInDown">
                        <figure>
                            <a class="item-hover lightbox" href="../frontend/web/images/demo/portfolio/merchant2-600x403.jpg" data-plugin-options='{"type":"image"}'>
                                <span class="overlay color2"></span>
                                <span class="inner">
                                    <span class="block fa fa-plus fsize20"></span>
                                    <strong>ДЕТАЛИ</strong> ЗАНЯТИЯ
                                </span>
                            </a>
                            <img class="img-responsive" src="../frontend/web/images/demo/portfolio/merchant2-600x403.jpg" width="260" height="260" alt="">
                        </figure>
                        <div class="item-box-desc">
                            <h4>Творим благополучие!</h4>
                            <small class="styleColor">29 June, 2014</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-3"><!-- item 4 -->
                    <div class="item-box appear-animation pull-left inner" data-animation="fadeInRight">
                        <figure>
                            <a class="item-hover" href="">
                                <span class="overlay color2"></span>
                                <span class="inner">
                                    <span class="block fa fa-plus fsize20"></span>
                                    <strong>ДЕТАЛИ</strong> ЗАНЯТИЯ
                                </span>
                            </a>
                            <img class="img-responsive" src="../frontend/web/images/demo/portfolio/flippin-the-bird1-600x403.jpg" width="260" height="260" alt="">
                        </figure>
                        <div class="item-box-desc">
                            <h4>Очищение пространства.</h4>
                            <small class="styleColor">29 June, 2014</small>
                        </div>
                    </div>
                </div>

            </div>
            <!--<center><a class="btn btn-primary btn-lg" href="shortcodes-rows.html">Записаться на занятие</a></center>-->
        </div>
    </section>
    <!-- /PORTFOLIO -->    
    <!--TESTIONARS-->
    <section id="testionars" class="container padding100">

        				<div class="row">
					<div class="col-md-6">
						<h4>Почему выбирают нас?</h4>
						<ul class="list-icon star-o">
							<li>Fully responsive so your content will always look good on any screen size</li>
							<li>Awesome sliders give you the opportunity to showcase important content</li>
							<li>Unlimited color options with a backed color picker, including the gradients</li>
							<li>Multiple layout options for home pages, portfolio section &amp; blog section</li>
							<li>We offer free support because we care about your site as much as you do.</li>
						</ul>
					</div>

					<div class="col-md-6">
						<h4>Что говорят о нас клиенты?</h4>
						<div class="owl-carousel text-center" data-plugin-options='{"items": 1, "singleItem": true, "navigation": false, "pagination": true, "autoPlay": true, "transitionStyle":"fadeUp"}'><!-- transitionStyle: fade, backSlide, goDown, fadeUp,  -->
							<div class="testimonial white">
								<p>Praesent est laborum dolo rumes fugats untras. Etha rums ser quidem rerum facilis dolores nemis onis fugats vitaes nemo minima rerums unsers sadips amets.</p>
								<cite><strong>John Doe</strong>, Customer</cite>
							</div>

							<div class="testimonial white">
								<p>Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien. Praesent id enim sit amet odio vulputate eleifend in in tortor. Donec tellus massa.</p>
								<cite><strong>Jessica Doe</strong>, Customer</cite>
							</div>

							<div class="testimonial white">
								<p>Praesent est laborum dolo rumes fugats untras. Etha rums ser quidem rerum facilis dolores nemis onis fugats vitaes nemo minima rerums unsers sadips amets.</p>
								<cite><strong>Dorin Doe</strong>, Customer</cite>
							</div>

							<div class="testimonial white">
								<p>Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien. Praesent id enim sit amet odio vulputate eleifend in in tortor. Donec tellus massa.</p>
								<cite><strong>Melissa Doe</strong>, Customer</cite>
							</div>

						</div>
					</div>
				</div>

<a class="btn btn-primary btn-lg" href="shortcodes-rows.html">Оставить отзыв</a>
<a class="btn btn-default btn-lg" href="shortcodes-rows.html">Больше отзывов</a> 
    </section>
    <!--/TESTIONARS-->
    <!-- CONTACT -->
    <section id="contact" class="special-row padding100 margin-footer">
        <div class="container">

            <h1 class="text-center">Формат работы студии <strong>Артгорница</strong></h1>


            <p class="lead">Перед тем как заключать договор на 100 дней поддержки и вдохновения мы встречаемся с Вами в
            Skype на час-полтора для того, чтобы понять, насколько мы подходим друг другу.</p>

            <div class="divider  styleColor"><!-- divider -->
                <i class="fa fa-leaf"></i>
            </div>
            <div class="row margin-top60">

            <!-- FORM -->
            <div class="col-md-12">

                <h2>Здесь Вы можете задать вопросы и записаться на бесплатную консультацию!</h2>
                <div class="appear-animation  " data-animation="fadeInDown">
                    <form class="white-row" action="#" method="post">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Имя *</label>
                                    <input type="text" value="" data-msg-required="Пожалуйта, введите свое имя."
                                           maxlength="100" class="form-control" name="name" id="name">
                                </div>
                                <div class="col-md-6">
                                    <label>E-mail адресс *</label>
                                    <input type="email" value="" data-msg-required="Пожалуйста, введите свой E-mail."
                                           data-msg-email="Please enter a valid email address." maxlength="100"
                                           class="form-control" name="email" id="email">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Сообщение *</label>
                                    <textarea maxlength="5000" data-msg-required="Пожалуйста, раскажите немного о себе..." rows="6"
                                              class="form-control" name="message" id="message"></textarea>
                                </div>
                            </div>
                        </div>

                        <br/>

                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" value="Отправить сообщение" class="btn btn-primary btn-lg"
                                       data-loading-text="Loading...">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /FORM -->

            </div>
        </div>
    </section>
    <!-- /CONTACT -->
</div>