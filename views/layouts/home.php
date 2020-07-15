<?php



use app\assets\AppHomeAsset;
use app\assets\OldIeAsset;
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
    <meta name="viewport" content="width=device-width, initial-scale=1">

<?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>
<!--header-->
<div class="header">
    <div class="header-top">
        <div class="container">
            <div class="top-left">
                <a href="#"> Help  <i class="glyphicon glyphicon-phone" aria-hidden="true"></i> +0123-456-789</a>
            </div>
            <div class="top-right">
                <ul>
                    <li><a href="checkout.html">Checkout</a></li>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="registered.html"> Create Account </a></li>
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
                        <li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
                    </ul> <!-- cd-header-buttons -->
                    <div id="cd-search" class="cd-search">
                        <form action="<?= \yii\helpers\Url::to(['product/search'])?>" method="get">
                            <input name="search" type="text" placeholder="Поиск...">
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
<!--                                        <span class="cart-qty" id="my_cart-qty">--><?//= isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] : 'Корзина пуста' ?><!-- </span>-->
                                        <span class="cart-sum" id="my_cart-sum"><?= $_SESSION['cart.sum'] ?? '0' ?> </span><span> руб.</span>
<!--                                        <span class="cart-sum" id="my_cart-sum">--><?//= isset($_SESSION['cart.sum']) ? print('на сумму: ') . $_SESSION['cart.sum']  : '' ?><!--</span>-->
                                        <!--$--><?/*= isset($_SESSION['cart-sum']) ?
                    $_SESSION['cart-sum'] : '0' */?>
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

<?= $content ?>

<!---footer--->

<div class="footer-w3l" id="my_footer">
    <div class="container">
        <div class="footer-grids">
            <div class="col-md-3 footer-grid">
                <h4>About </h4>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
            </div>
            <div class="col-md-3 footer-grid">
                <h4>My Account</h4>
                <ul>
                    <li><a href="checkout.html">Checkout</a></li>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="registered.html"> Create Account </a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-grid">
                <h4>Information</h4>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="products.html">Products</a></li>
                    <li><a href="codes.html">Short Codes</a></li>
                    <li><a href="mail.html">Mail Us</a></li>
                    <li><a href="products1.html">products1</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-grid foot">
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
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>