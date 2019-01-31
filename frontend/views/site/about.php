<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\assets\ThemeAsset;
use frontend\widgets\owlcarousel\OwlCarouselWidget;
use backend\modules\portfolio\models\Menu;
use backend\modules\portfolio\models\Items;

ThemeAsset::register($this);

$this->title = Yii::t('yee', 'About');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <section id="about" class="container">
        <!-- Who Am I -->
        <article class="row">
            <div class="col-md-6">
                <?php

                OwlCarouselWidget::begin([
                    'container' => 'div',
                    'containerOptions' => [
                        'class' => 'owl-carousel controlls-over'
                    ],
                    'pluginOptions' => [
                        'items' => 1,
                        'singleItem' => true,
                        'navigation' => true,
                        'pagination' => true,
                        'transitionStyle' => 'fadeUp',
                        'autoPlay' => 9000,
                    ]
                ]);
                ?>
                    <div>
                        <img alt="" class="img-responsive" src="../frontend/web/images/demo/home/church_slider_1.jpg">
                    </div>
                    <div>
                        <img alt="" class="img-responsive" src="../frontend/web/images/demo/home/church_slider_3.jpg">
                    </div>
                    <div>
                        <img alt="" class="img-responsive" src="../frontend/web/images/demo/home/church_slider_2.jpg">
                    </div>


                 <?php OwlCarouselWidget::end(); ?>
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

                <p class="lead">В фотогалерее представлены фотографии моих работ и работ моих клиентов. 
                    Также здесь Вы можете познакомиться поближе <a href=""></a>
                    с Арттерапией. Здесь Вы найдете много видео и фото с наших занятий.</p>

               
                    <?php 

                    echo yii\widgets\Menu::widget([
                        'encodeLabels' => false,
                        'options' => [
                            'class' => 'nav nav-pills isotope-filter isotope-filter', 
                            'data-sort-id' => 'isotope-list', 
                            'data-option-key' => 'filter'
                            ],
                        'items' => Menu::getPortfolioMenuItems(),
                    ]);
                    
                    echo frontend\widgets\PortfolioWidget::widget([                        
                        'slides' => Items::getPortfolioMasonryItems(),
                    ]);
                    ?>
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
