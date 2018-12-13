<?php
/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use frontend\assets\ThemeAsset;
use yeesoft\models\Menu;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yeesoft\comment\widgets\RecentComments;

Yii::$app->assetManager->forceCopy = true;
$assetBundle = AppAsset::register($this);
ThemeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0"/>

    <?= Html::csrfMetaTags() ?>
    <?= $this->renderMetaTags() ?>
    <?php $this->head() ?>
    <?php $this->registerJsFile('plugins/modernizr.min.js', ['position' => \yii\web\View::POS_HEAD]) ?>
</head>
<body>
<?php $this->beginBody() ?>
<!-- Top Bar -->
<header id="topHead" class="color fixed">
    <div class="container">
        <i class="fa fa-phone"></i> +7 (910) 123-45-67 &bull;
        <a href="mailto:info@artgornica.ru">info@artgornica.ru</a>

        <div class="pull-right socials">
            <ul class="nav nav-pills nav-main">
                <?php
                /* $menuSocial = Menu::getMenuItems('social-menu');

                 echo Nav::widget([
                     'id' => 'socialMain',
                     'encodeLabels' => false,
                     'options' => ['class' => 'nav nav-pills nav-main scroll-menu'],
                     'items' => $menuSocial,
                 ]);*/

                ?>
                <ul class="nav nav-pills nav-main">
                    <li><a href="#" class="pull-left social fa fa-facebook"></a></li>
                    <li><a href="#" class="pull-left social fa fa-linkedin"></a></li>
                    <li><a href="#" class="pull-left social fa fa-youtube-square"></a></li>
                </ul>
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
             <?  $logo = $assetBundle->baseUrl . '/images/logo-1.png'; ?>
            <a class="logo" href="<?= \yii\helpers\Url::home(); ?>"><?= Html::img($logo, ['alt' => 'Artgornica.ru']) ?>
                <h7> Artgornica.ru</h7>
            </a>


        <!-- Top Nav -->
        <div class="navbar-collapse nav-main-collapse collapse pull-right">
            <nav class="nav-main mega-menu">

                <?php
                $menuItems = Menu::getMenuItems('main-menu');
                if (Yii::$app->user->isGuest) {
                    $menuItems[] = ['label' => Yii::t('yee/auth', 'Signup'), 'url' => \yii\helpers\Url::to(['/auth/default/signup'])];
                    $menuItems[] = ['label' => Yii::t('yee/auth', 'Login'), 'url' => ['/auth/default/login']];
                } else {
                    $menuItems[] = [
                        'label' => Yii::$app->user->identity->username,
                        'url' => ['/auth/default/profile'],
                    ];

                    $menuItems[] = [
                        'label' => Yii::t('yee/auth', 'Logout'),
                        'url' => ['/auth/default/logout', 'language' => false],
                        'linkOptions' => ['data-method' => 'post']
                    ];

                }
                $menuItems[] = [
                    'label' => '<form method="get" action="#" class="input-group pull-right">
                                    <input type="text" class="form-control" name="k" id="k" value="" placeholder="Поиск...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary notransition"><i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </form>',
                    'options' => ['class' => 'search'],
                ];
                echo Nav::widget([
                    'id' => 'topMain',
                    'encodeLabels' => false,
                    'options' => ['class' => 'nav nav-pills nav-main scroll-menu'],
                    'items' => $menuItems,
                ]);
                ?>
            </nav>
        </div>
        <!-- /Top Nav -->
    </div>
</header>
<div id="wrapper">

    <!--    <div class="site-about">-->
<!-- /TOP NAV -->
<!--<br/><br/><br/><br/>-->

<?//= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?>
<?= Alert::widget() ?>
<?= $content ?>

</div>
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
                                Москва<br/>
                                Красногорск<br/>
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
