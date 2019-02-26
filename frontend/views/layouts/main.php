<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yeesoft\auth\assets\AvatarAsset;
use common\widgets\Alert;
use frontend\assets\AppAsset;
use yeesoft\models\Menu;
use yii\bootstrap\Nav;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

Yii::$app->assetManager->forceCopy = true;
$assetBundle = AppAsset::register($this);

AvatarAsset::register($this);
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
        <?php $this->registerJsFile('/plugins/modernizr.min.js', ['position' => \yii\web\View::POS_HEAD]) ?>
       
    </head>
    <body>
        <span id="header_shadow" ></span>
        <?php $this->beginBody() ?>
        <!-- Top Bar -->
        <header id="topHead" class="color fixed">
            <div class="container">
                <i class="fa fa-phone"></i> +7 (910) 123-45-67 &bull;
                <a href="mailto:info@artgornica.ru">info@artgornica.ru</a>

                <div class="pull-right socials">
                    <a href="https://www.facebook.com/%D0%A1%D1%82%D1%83%D0%B4%D0%B8%D1%8F
                       -%D0%95%D0%BB%D0%B5%D0%BD%D1%8B
                       -%D0%98%D1%88%D0%B0%D0%BD%D0%BE%D0%B2%D0%BE%D0%B9-%D0%90%D1%80%D1%82-
                       %D0%93%D0%BE%D1%80%D0%BD%D0%B8%D1%86%D0%B0-554783454950098/" class="pull-left social fa fa-facebook"></a>
                    <a href="https://www.instagram.com/elenaishanova/" class="pull-left social fa fa-linkedin"></a>
                </div>
                <!-- LINKS -->
                <div class="pull-right nav hidden-xs">

                    <?php
                    $menuItems = [
                        ['label' => '<i class="fa fa-home" style="margin: 5px;"></i>' . Yii::t('yee', 'Home'), 'url' => Yii::$app->urlManager->hostInfo],
                    ];
                    // $menuItems = Menu::getMenuItems('main-menu');
                    if (Yii::$app->user->isGuest) {
                        $menuItems[] = [
                            'label' => '<i class="fa fa-user-plus" style="margin: 5px;"></i>' . Yii::t('yee/auth', 'Signup'),
                            'url' => \yii\helpers\Url::to(['/auth/default/signup'])
                        ];
                        $menuItems[] = [
                            'label' => '<i class="fa fa-sign-in" style="margin: 5px;"></i>' . Yii::t('yee/auth', 'Enter'),
                            'url' => \yii\helpers\Url::to(['/auth/default/login'])
                        ];
                    } else {
                        $avatar = ($userAvatar = Yii::$app->user->identity->getAvatar('small')) ? $userAvatar : AvatarAsset::getDefaultAvatar('small');
                        $menuItems[] = [
                            'label' => '<img src="' . $avatar . '" class="user-image" alt="User Image"/>' . Yii::$app->user->identity->username,
                            'url' => ['/site/private'],
                        ];
                        $menuItems[] = [
                            'label' => '<i class="fa fa-sign-out" style="margin: 5px;"></i>' . Yii::t('yee/auth', 'Logout'),
                            'url' => ['/auth/default/logout', 'language' => false],
                            'template' => '<a href="{url}" data-method = "post">{label}</a>'                           
                        ];
                    }

                    echo yii\widgets\Menu::widget([
                        'encodeLabels' => false,
                        'options' => ['class' => 'menu-top nav-main'],
                        'items' => $menuItems,
                    ]);
                    ?>
                </div>
                <!-- /LINKS -->
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
                <?php  $logo = $assetBundle->baseUrl . '/images/logo-1.png'; ?>
                <a class="logo" href="<?= \yii\helpers\Url::home(); ?>"><?= Html::img($logo, ['alt' => 'Artgornica.ru']) ?>
                    <h7> Artgornica.ru</h7>
                </a>


                <!-- Top Nav -->
                <div class="navbar-collapse nav-main-collapse collapse pull-right">
                    <nav class="nav-main mega-menu">

                        <?php
                        $navItems = Menu::getMenuItems('main-menu');
                       
                        $navItems[] = [
                            'label' => '<form method="get" action="/site/search" class="input-group pull-right">
                                    <input type="text" class="form-control" name="q" id="k" value="" placeholder="Поиск...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary "><i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </form>',
                            'options' => ['class' => 'search'],
                        ];
                         
                        echo Nav::widget([
                            'id' => 'topMain',
                            'encodeLabels' => false,
                            'options' => ['class' => 'nav nav-pills nav-main scroll-menu'],
                            'items' => $navItems,
                        ]);
                     
                        ?>
                    </nav>
                </div>
                <!-- /Top Nav -->
            </div>
        </header>

        <div id="wrapper"> 
            <?php if (Url::to() != '/'): ?>
                <!-- PAGE TITLE -->
                <header id="page-title">
                    <div class="container">
                        <h1><?= Html::encode($this->title) ?></h1>
                        <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?>
                    </div>
                </header>
                <section class="container">
                    <?= Alert::widget(
                            [
                                'options' =>[
                                    'class' => 'frontend',
                                ],
                            ]
                            ) ?>
                </section>
            <?php endif; ?>
                
            <?= $content ?>

        </div>
        <!-- FOOTER -->
        <footer>
            <!-- copyright , scrollTo Top -->
            <div class="footer-bar">
                <div class="container">
                    <span class="copyright">Copyright &copy; artgornica.ru,  Все права защищены.</span>
                    <a class="toTop" href="#topNav">НАВЕРХ <i class="fa fa-arrow-circle-up"></i></a>
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
