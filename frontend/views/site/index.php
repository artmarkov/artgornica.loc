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
                        <a href="<?= \yii\helpers\Url::to('/contact') ?>" class="btn btn-primary btn-lg">Записаться на занятие 
                            <i class="fa fa-chevron-circle-right"></i></a>
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
                        <a href="<?= \yii\helpers\Url::to('/contact') ?>" class="btn btn-default btn-lg">Записаться на встречу</a>
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
                        <a href="<?= \yii\helpers\Url::to('/blog') ?>" class="btn btn-info btn-lg">УЗНАТЬ БОЛЬШЕ...</a>
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

        <p class="lead">Курс <a href="">"30 встреч"</a> помогает познать себя и окружающий мир, раскрыть в себе новые способности,
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
                <ul class="list-icon star-o color">
                    <li>Вы хотите заниматься тем, что доставляет удовольствие и быть счастливым, но Вы не решаетесь сделать шаг навстречу своим желаниям и мечтам?</li>
                    <li>Начните сейчас жить, не цепляясь за старое и страшась перемен! </li>
                    <li>Впустите в свою жизнь радость!</li>
                    <li>Почувствуйте себя, свой внутренний мир, свои ценности! </li>
                    <li>Поверьте в свои способности! Цените свое время! Познавайте новое! </li>
                    <li>Создайте намерение, цель, свою мечту!</li>
                    <li>Зажгите в себе энергию и направьте ее на что-то важное, следуйте за своей мечтой!</li>
                </ul>
                <a href="<?= \yii\helpers\Url::to('/contact') ?>" class="btn btn-primary btn-lg">Записаться на курс <i class="fa fa-chevron-circle-right"></i></a>
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
    <section id = "post" class="container padding50 nopadding-top">
        <h2>
            <strong class="styleColor">Это </strong>Интересно
        </h2>
        <p class="lead">Приглашаю Вас посетить мой Блог, где Вы найдете много интересных и занимательных статей.
        </p>
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

                        <a href="<?= \yii\helpers\Url::to('/contact') ?>" class="btn btn-primary btn-lg">Записаться на курс <i class="fa fa-chevron-circle-right"></i></a>
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
    <section id="portfolio" class="special-row padding50">
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
          
        </div>
    </section>
    <!-- /PORTFOLIO -->    
 
    <!-- SERVICES -->
	<section class="margin-top50">
        <div class="container">

            <h2>Формат работы студии <strong>Артгорница</strong></h2>

            <div class="row">
                <p class="lead">Перед тем как заключить договор мы с Вами встречаемся на один час, 
                    чтобы понять Ваш волнующий вопрос и насколько мы подходим друг другу. 
                    Эта первая встреча бесплатно.</p>
                <hr />


                <h2><strong>Варианты</strong> дальнейшей работы:</h2>
                
                <!-- SERVICE 1 -->
                <div class="row margin-top30">

                    <!-- SERVICE 1 -->
                    <div class="col-md-2 text-center">
                        <i class="nomargin featured-icon fa fa-heart-o"></i>
                    </div>

                    <div class="col-md-10">
                        <h3><strong>Индивидуальное</strong> консультирование</h3>
                        <p>Для индивидуального консультирования разработан авторский курс 
                            «30 встреч» - Путь к поиску себя! 
                        </p>
                        <p>Курс "30 встреч" помогает познать себя и окружающий мир, раскрыть в себе новые способности, 
                            не бояться изменять свою жизнь, осознать свою способность быть счастливым и делиться этим счастьем с другими!</p>
                        <p>После заключения договора на авторский курс «30 встреч» мы с Вами встречаемся 2 раза в неделю в течение 4х месяцев. </p>
                    </div>

                </div>

                <div class="divider half-margins"><!-- divider -->
                    <i class="fa fa-plus-circle"></i>
                </div>

                <!-- SERVICE 2 -->
                <div class="row margin-top30">

                    <div class="col-md-2 text-center">
                        <i class="nomargin featured-icon fa fa-smile-o"></i>
                    </div>

                    <div class="col-md-10">
                        <h3>Психологическая работа в <strong>группе</strong></h3>
                        <p>Работа в группе из 6-7 участников проходит в формате от 2 до 10 встреч. </p>
                        <p>Темы и даты проведения занятий предварительно публикуются в Фейсбуке и Инстаграмме. 
                            Это могут быть темы: «Общество в миниатюре», «Мой внутренний мир», «Мой внутренний ребенок», 
                            «Эмоциональный интеллект», «Марафон прощания с обидами» и другие. </p>
                        <p>Вы сами выбираете интересующую Вас тему. </p>
                        <p>Вы записываетесь на мероприятие по телефону или отправляете сообщение в месенджере или на сайте.</p>
                    </div>

                </div>
            </div>  
</div>
           </section>
    <!-- /SERVICES -->    
    <div class="divider  styleColor"><!-- divider -->
        <i class="fa fa-leaf"></i>
    </div>
    <!--TESTIONARS-->
    <section id="testionars"  class="padding50 margin-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3>Наши занятия <strong>помогают</strong>:</h3>
                    <ul class="list-icon star-o color">
                        <li>Отпустить эмоциональные переживания из прошлого и настоящего, тревогу за будущее.</li>
                        <li>Освободившуюся энергию направить на раскрытие потенциальных возможностей</li>
                        <li>Осознать свои мысли и эмоции</li>
                        <li>Выработать умение контролировать себя, свои чувства и переживания</li>
                        <li>Находить радостные моменты в любом событии Вашей жизни, даже кажущемся отрицательным</li>
                        <li>Выработать привычку – «Быть счастливым!»</li>
                    </ul>
                </div>

                <div class="col-md-6">
                    <h3>Что о нас говорят <strong>клиенты</strong>?</h3>
                    <div class="owl-carousel text-center" data-plugin-options='{"items": 1, "singleItem": true, "naviga о нас tion": false, "pagination": true, "autoPlay": true, "transitionStyle":"fadeUp"}'><!-- transitionStyle: fade, backSlide, goDown, fadeUp,  -->
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
                    <div class="row text-center nomargin-bottom">
                        <a href="<?= \yii\helpers\Url::to('/contact') ?>" class="btn btn-primary">Оставить отзыв</a>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/TESTIONARS-->
    
    <div class="divider"><!-- divider -->
        <i class="fa fa-leaf"></i>
    </div>

    <!-- CALLOUT -->
    <section class="container">

        <div class="bs-callout special-row text-center nomargin">
            <h3>Записаться на <strong>бесплатную</strong> консультацию! <a href="<?= \yii\helpers\Url::to('/contact') ?>" class="btn btn-primary btn-lg">Записаться <i class="fa fa-chevron-circle-right"></i></a></h3>
        </div>

    </section>
    <!-- /CALLOUT -->
</div>