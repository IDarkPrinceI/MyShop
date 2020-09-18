<?php



use app\assets\AppHomeAsset;
use app\assets\OldIeAsset;
use phpnt\yandexMap\YandexMaps;
use yii\helpers\Html;
use app\components\DropDownWidget;
use yii\helpers\Url;


AppHomeAsset::register($this);
OldIeAsset::register($this);
?>


<?php $this->beginPage() ?>
<!DOCTYPE HTML>
<html lang="<?= Yii::$app->language ?>">
<head>

    <meta charset="<?= Yii::$app->charset ?>">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>
<!--header-->
<div class="header">
    <div class="header-top">
        <div class="container">
            <div class="top-left">
                <a href="#"> Помощь  <i class="glyphicon glyphicon-phone" aria-hidden="true"></i> +0123-456-789</a>
            </div>
            <div class="top-right">
                <ul>
                    <?php if (Yii::$app->user->isGuest): ?>
                    <li><a href="<?= Url::to(['user/login'])?>">Вход / Регистрация</a></li>
                    <?php else: ?>
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">
                            <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                                <?= Yii::$app->user->identity['username']?></span>
                        </a>
                        <ul class="dropdown-menu pull-right profile">
                            <!-- The user image in the menu -->
                            <li class="user-header">
<!--                                <p>Alexander Pierce</p>-->
                                <span>Вы вошли как: <?= Yii::$app->user->identity['role']?></span>
                            </li>
                            <div class="clearfix"> </div>
                            <li class="divider"></li>
                            <div class="clearfix"> </div>
                            <li id="profile" class="user-footer">
                                <div class="pull-left">
                                    <?php if (Yii::$app->user->identity['role'] === 'admin'): ?>
                                        <a href="<?= Url::to(['far/home/index'])?>" class="btn btn-default btn-flat">Админка</a>
                                    <?php else: ?>
                                        <a href="<?= Url::to(['user/profile'])?>" class="btn btn-default btn-flat">Профиль</a>
                                    <?php endif; ?>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-default btn-flat" href="<?= Url::to(['user/logout'])?>">Выйти</a>
                                </div>
                            </li>
                        </ul>
                    </li>
<?php endif; ?>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="heder-bottom">
        <div class="container">
            <div class="logo-nav">
                <div class="logo-nav-left">
                    <h1><a href="<?= Url::home()?>">Instrumental<span>All for you</span></a></h1>
                </div>
                <div class="logo-nav-left1">
                    <nav class="navbar navbar-default">
                        <div class="navbar-header nav_2">
                            <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                                <!-- dropDownWidget -->
                            <ul class="nav navbar-nav">
                                <?= DropDownWidget::widget([
                                    'tpl' => 'dropDown',
                                ])?>
                            </ul>
                                <!-- dropDownWidget -->
                        </div>
                    </nav>
                </div>
                <div class="logo-nav-right">
                    <ul class="cd-header-buttons">
<!--                        <li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>-->
                        <li><a class="cd-search-trigger"><span></span></a></li>
                    </ul> <!-- cd-header-buttons -->
                    <div id="cd-search" class="cd-search">
                        <form action="<?= Url::to(['product/search'])?>" method="get">
                            <input autocomplete="off" name="search" type="text" placeholder="Поиск...">
                        </form>
                    </div>
                </div>
                <div class="header-right2">
                    <div class="cart box_1">
                            <h3>
<!--                                button cart-->
                                <div class="total">
                                    <button onclick="getCart()" id="my_cart" type="button"  data-toggle="modal" data-target="#modal-cart">
                                        <span class="cart-qty" id="my_cart-qty"><?= $_SESSION['cart.qty'] ?? '0' ?> </span><span> шт. на сумму:</span>
                                        <span class="cart-sum" id="my_cart-sum"><?= $_SESSION['cart.sum'] ?? '0' ?> </span><span> руб.</span>

                                    </button>
<!--                                button cart-->
                                <img id="my_bag" src="/images/bag.png" alt="" />
                            </h3>
                        </a>
                        <div class="clearfix"> </div>
                    </div>
                    <!-- modalCart -->
                    <div class="modal fade" id="modal-cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" id="my_close" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Моя корзина</h4>
                                </div>
                                <div class="modal-body">
                                </div>
                                <div class="modal-footer">
                                    <button onclick="clearCart()" type="button" class="btn btn-danger pull-left" id="my_clean">Очистить корзину</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
                                    <a href="<?= \yii\helpers\Url::to(['cart/checkout'])?>" class="btn btn-success">Оформить заказ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- modalCart -->
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</div>
<!--header-->


<div id="content">
    <?= $content ?>
</div>


<!---footer--->
<?php
echo YandexMaps::widget([
    'myPlacemarks'          => $items,
    'mapOptions'            => [
        'center'            => [52, 59],                                                // центр карты
        'zoom'              => 3,                                                       // показывать в масштабе
        'controls'          => ['zoomControl',  'fullscreenControl', 'searchControl'],  // использовать эл. управления
        'control'           => [
            'zoomControl'   => [                                                        // расположение кнопок управлением масштабом
                'top'       => 75,
                'left'      => 5
            ],
        ],
    ],
    'disableScroll'         => true,                                                    // отключить скролл колесиком мыши (по умолчанию true)
    'windowWidth'           => '100%',                                                  // длинна карты (по умолчанию 100%)
    'windowHeight'          => '400px',                                                 // высота карты (по умолчанию 400px)
]); ?>
<div class="footer-w3l" id="my_footer">
    <div class="container">
        <div class="footer-grids">
            <div class="col-md-4 footer-grid">
                <h4>О сайте </h4>
                <p>Какая-то информация о сайте.</p>
            </div>
            <div class="col-md-4 footer-grid">
                <h4>Мой аккаунт</h4>
                <ul>
                    <li><a href="<?= Url::to(['user/profile'])?>">Профиль</a></li>
                    <li><a href="<?= Url::to(['user/logout'])?>">Выйти</a></li>
                </ul>
            </div>
<!--            <div class="col-md-3 footer-grid">-->
<!--                <h4>Information</h4>-->
<!--                <ul>-->
<!--                    <li><a href="index.html">Home</a></li>-->
<!--                    <li><a href="products.html">Products</a></li>-->
<!--                    <li><a href="codes.html">Short Codes</a></li>-->
<!--                    <li><a href="mail.html">Mail Us</a></li>-->
<!--                    <li><a href="products1.html">products1</a></li>-->
<!--                </ul>-->
<!--            </div>-->
            <div class="col-md-4 footer-grid foot">
                <h4>Contacts</h4>
                <ul>
                    <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i><a href="#">E Comertown Rd, Westby, USA</a></li>
                    <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i><a href="#">1 599-033-5036</a></li>
                    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:example@mail.com"> example@mail.com</a></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>

    </div>
</div>
<!---footer--->
<!--modalProduct-->
<div class="modal fade" id="myModalSingle" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-info">
            <div class="modal-header">
                <h4>Быстрый просмотр</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
<!--modalProduct-->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>