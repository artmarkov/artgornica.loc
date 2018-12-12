<?php
/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use frontend\assets\ThemeAsset;
use yeesoft\models\Menu;
use yeesoft\widgets\LanguageSelector;
use yeesoft\widgets\Nav as Navigation;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yeesoft\comment\widgets\RecentComments;

Yii::$app->assetManager->forceCopy = true;
AppAsset::register($this);
//ThemeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if IE 8]>
<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>
<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->
<html> <!--<![endif]-->
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0"/>

        <?= Html::csrfMetaTags() ?>
        <?= $this->renderMetaTags() ?>
        <?php $this->head() ?>
        <?php $this->registerJsFile('plugins/modernizr.min.js', ['position' => \yii\web\View::POS_HEAD]) ?>
    </head>


    <!--
        <title>Артгорница - 30 шагов к успеху</title>
        <meta name="keywords"
              content="арттерапия,психологическоеконсультирование,поисксебя,веритьвчудеса,радоватьсяжизни,счастьеесть"/>
        <meta name="description" content="Студия Елены Ишановой Арт-Горница"/>
        <meta name="Author" content="Елена Ишанова"/>
    
    -->



    <body>
        <?php $this->beginBody() ?>
        <!-- class= "boxed pattern9" Available classes for body: boxed , pattern1...pattern10 . Background Image - example add: data-background="assets/images/boxed_background/1.jpg"  -->

        <!-- Top Bar -->
        <header id="topHead" class="color fixed">
            <div class="container">
                <i class="fa fa-phone"></i> +7 (910) 123-45-67 &bull;
                <a href="mailto:info@artgornica.ru">info@artgornica.ru</a>

                <div class="pull-right socials">
                    <a href="#" class="pull-left social fa fa-facebook"></a>
                    <a href="#" class="pull-left social fa fa-linkedin"></a>
                    <a href="#" class="pull-left social fa fa-youtube-square"></a>
                </div>
            </div>
        </header>
        <!-- /Top Bar -->

        <!-- TOP NAV -->
        <header id="topNav" class="topHead">
            <div class="container">

                <!-- Mobile Menu Button -->
                <button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Logo text or image -->
                <a class="logo" href="#"><img src="../frontend/web/images/logo-1.png" alt="Artgornica.ru"/>
                    <h7> Artgornica.ru</h7>

                </a>

                <!-- Top Nav -->
                <div class="navbar-collapse nav-main-collapse collapse pull-right">
                    <nav class="nav-main mega-menu">
                        <ul class="nav nav-pills nav-main scroll-menu" id="topMain">
                            <li>
                                <a bhref="#">
                                    Главная
                                </a>

                            </li>
                            <li>
                                <a bhref="#">
                                    Обо мне
                                </a>

                            </li>
                            <li>
                                <a bhref="#">
                                    Консультации
                                </a>

                            </li>

                            <li>
                                <a href="#">
                                    Блог
                                </a>

                            </li>
                            <li>
                                <a href="#">
                                    Портфолио
                                </a>

                            </li>

                            <!-- GLOBAL SEARCH -->
                            <li class="search">
                                <!-- search form -->
                                <form method="get" action="#" class="input-group pull-right">
                                    <input type="text" class="form-control" name="k" id="k" value="" placeholder="Поиск...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary notransition"><i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </form>
                                <!-- /search form -->
                            </li>
                            <!-- /GLOBAL SEARCH -->

                        </ul>
                    </nav>
                </div>
                <!-- /Top Nav -->

            </div>
        </header>
        <!-- /TOP NAV -->

        <?= $content ?>


        <!-- FOOTER -->
        <footer>

            <!-- copyright , scrollTo Top -->
            <div class="footer-bar">
                <div class="container">
                    <span class="copyright">Copyright &copy; artgornica.ru,  Все права защищены.</span>
                    <a class="toTop" href="#topNav">Вверх <i class="fa fa-arrow-up"></i></a>
                </div>
            </div>
            <!-- copyright , scrollTo Top -->
            <!-- footer content -->
            <div class="footer-content">
                <div class="container">

                    <div class="row">


                        <!-- FOOTER CONTACT INFO -->
                        <div class="column col-md-12">
                            <h3>Контакты</h3>

                            <address class="font-opensans">
                                <ul>
                                    <li class="footer-sprite address">
                                        Москва<br />
                                        Красногорск<br />
                                    </li>
                                    <li class="footer-sprite phone">
                                        Тел: 1-800-565-2390
                                    </li>
                                    <li class="footer-sprite email">
                                        <a href="mailto:support@yourname.com">support@yourname.com</a>
                                    </li>
                                </ul>
                            </address>

                        </div>
                        <!-- /FOOTER CONTACT INFO -->
                    </div>

                </div>
            </div>
            <!-- footer content -->

        </footer>
        <!-- /FOOTER -->


        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
