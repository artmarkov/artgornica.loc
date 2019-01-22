<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\assets\ThemeAsset;

ThemeAsset::register($this);

$this->title = Yii::t('yee', 'About');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <section id="about" class="container">
        <!-- Who Am I -->
        <article class="row">
            <div class="col-md-6">
                <div class="owl-carousel controlls-over" data-plugin-options='{"autoPlay":9000, "items": 1, "singleItem": true, "navigation": true, "pagination": true, "transitionStyle":"fadeUp"}'>
                    <div>
                        <img class="img-responsive" src="../frontend/web/images/sunset-1.jpg" width="555" height="311" alt="">
                    </div>
                    <div>
                        <img class="img-responsive" src="../frontend/web/images/fishermen-1.jpg" width="555" height="311" alt="">
                    </div>
                    <div>
                        <img class="img-responsive" src="../frontend/web/images/sunset-silhouette-2081796_1920.jpg" width="555" height="311" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h4><i class="fa fa-heart-o"></i> Кто Я?</h4>
                <p>Елена Ишанова - основатель и руководитель Студии «Арт-Горница», 
                    психолог, арт-терапевт, коуч по программе «Путь к поиску Себя!»</p>
                <h4><i class="fa fa-heart-o"></i> Направление деятельности:</h4>
                <p>Психологическое консультирование индивидуально и в группе, 
                    с применением методов арт-терапии.</p>
                <h4><i class="fa fa-heart-o"></i> Мои творческие увлечения:</h4>
                <ul class="list-icon heart-o color">
                    <li>Рисунок в студии живописи и рисунка «Пушкин»</li>
                    <li>Курс «Иконопись» в  мастерской возрождения творчества</li>
                    <li>Курс «Каллиграфия» в национальной школе «Искусство красивого письма»</li>
                </ul>
                <hr />
            </div>
        </article>
        <article class="row">
            <div class="col-md-12">
                <h4><i class="fa fa-heart-o"></i> Образование:</h4>
                <p>Психологическое образование - Институт интенционально-синергетической психологии (ИИСП), 
                    специальность психолог арт-терапевт. </p>
                <h4><i class="fa fa-heart-o"></i> Опыт работы:</h4>
                <p>Закончив по первому образованию Экономический институт с красным дипломом, 
                    успешно работала в Банке и доросла в должности от Экономиста до Начальника отдела Ликвидности, 
                    получив второе Психологическое образование и оставив финансово-экономическую сферу деятельности, 
                    организовала Студию Елены Ишановой «Арт-Горница». Сейчас провожу психологические консультации и тренинги, и 
                    эффективно применяю самостоятельно разработанный мной курс «30 встреч» - Путь к поиску Себя!</p>
                <h4><i class="fa fa-heart-o"></i> О себе:</h4>
                <p>Много путешествую, люблю познавать мир, интересуюсь окружающими меня людьми. 
                    Много общаюсь с друзьями, совместно выезжаю на мероприятия – на полеты в компании друзей парапланеристов. 
                    Люблю подниматься в горы. Люблю лес и люблю собирать грибы. Люблю смотреть на звезды, на облака и на воду. 
                    Люблю дождь, люблю солнце, люблю золотую осень и снег. Люблю рисовать и фотографировать. Люблю дело, которым занимаюсь. </p>               
                <h4><i class="fa fa-heart-o"></i> Каждый клиент – это целая книга!</h4>
                <p>Имея большой опыт взаимодействия с клиентами, внимательно слушаю человека и ответственно подхожу к каждой встрече. 
                    Мои профессиональные знания и опыт работы в психологии, а также в экономике помогают мне анализировать и подбирать такие техники арт-терапии, 
                    которые оптимально раскрывают тему занятия и отвечают на волнующие вопросы участников курса «30 встреч».</p>
               
            </div>
        </article>
        <!-- /Who Am I -->

        <div class="divider styleColor"><!-- divider -->
            <i class="fa fa-heart"></i>
        </div>

        <section id="portfolio">

            <div class="container">

                <h2><strong>Добро пожаловать</strong> в мою фотогалерею</h2>

                <p class="lead">В фотогалерее представлены фотографии моих работ и работ моих клиентов. Также здесь Вы можете познакомиться поближе <a href=""></a>
                    с Арттерапией. Здесь Вы найдете много видео и фото с наших занятий.</p>

                <ul class="nav nav-pills isotope-filter isotope-filter" data-sort-id="isotope-list" data-option-key="filter">
                    <li data-option-value="*" class="active"><a href="#">Все материалы</a></li>
                    <li data-option-value=".development"><a href="#">Фото работ</a></li>
                    <li data-option-value=".photography"><a href="#">Видео</a></li>
                    <li data-option-value=".design"><a href="#">Разное</a></li>
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
        <div class="divider styleColor"><!-- divider -->
            <i class="fa fa-leaf"></i>
        </div>
        <!-- CALLOUT -->
        <section class="container">

            <div class="bs-callout text-center nomargin-bottom">
                <h3>Давайте развиваться <strong>вместе</strong>! <a href="<?= \yii\helpers\Url::to('/contact') ?>" class="btn btn-primary btn-lg">Свяжитесь со мной</a></h3>
            </div>

        </section>
        <!-- /CALLOUT -->

    </section>


</div>
