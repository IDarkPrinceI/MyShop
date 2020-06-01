<?php

use yii\widgets\LinkPager;

?>

<div class="content">
    <!--single-->
    <div class="single-wl3">
        <div class="container">
            <div class="single-grids">
                <div class="col-md-9 single-grid">
                    <div clas="single-top">
                        <div class="single-left">
                            <div class="flexslider">
                                <ul class="slides">
<!--                                    <li data-thumb="images/si.jpg">-->
                                        <div class="thumb-image"> <img src="<?= \yii\helpers\Url::to(["@web/product_img/{$product->img}", ['alt' => $product->name]]) ?>" data-imagezoom="true" class="img-responsive"> </div>
<!--                                    </li>-->
<!--                                    <li data-thumb="images/si1.jpg">-->
<!--                                        <div class="thumb-image"> <img src="images/si1.jpg" data-imagezoom="true" class="img-responsive"> </div>-->
<!--                                    </li>-->
<!--                                    <li data-thumb="images/si2.jpg">-->
<!--                                        <div class="thumb-image"> <img src="images/si2.jpg" data-imagezoom="true" class="img-responsive"> </div>-->
<!--                                    </li>-->
                                </ul>
                            </div>
                        </div>
                        <div class="single-right simpleCart_shelfItem">
                            <h4><?= $product->name ?></h4>
                            <div class="block">
                                <div class="starbox small ghosting"> </div>
                            </div>
                            <p class="price item_price">
                                <?php if((float)($product->old_price)): ?>
                                    <del> <?= $product->old_price ?> </del>
                                    /
                                <?php endif; ?>
                                <em class="price"><?= $product->price ?></em>
                                <em class="rub"> Р</em></p>
                            <div class="description">
                                <p><span>Описание  : </span> <?= $product->content ?></p>
                            </div>
                            <div class="color-quality">
                                <h6>Количество :</h6>
                                <div class="quantity">
                                    <div class="quantity-select">
                                        <div class="entry value-minus1">&nbsp;</div>
                                        <div class="entry value1"><span>1</span></div>
                                        <div class="entry value-plus1 active">&nbsp;</div>
                                    </div>
                                </div>
                            </div>
                            <div class="women">
                                <a href="<?= \yii\helpers\Url::to(['card/add', 'id' => $product['id']]) ?>" data-text="Add To Cart" class="my-cart-b item_add">Добавить в корзину</a>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!--single-->
    <?php if(isset($sale_product)): ?>
    <div class="new-arrivals-w3agile">
        <div class="container">
            <h2 class="tittle">Распродажа</h2>
            <?php foreach ($sale_product as $sale): ?>
            <div class="arrivals-grids">
                <div class="col-md-3 arrival-grid simpleCart_shelfItem">

                    <div class="grid-arr">
                        <div  class="grid-arrival">

                            <figure>
                                <a href="single.html">
                                    <div class="grid-img">
                                        <img  src="<?= \yii\helpers\Url::to(["@web/product_img/{$sale->img}", ['alt' => $sale->name]]) ?>" class="img-responsive">
                                    </div>
<!--                                    <div class="grid-img">-->
<!--                                        <img  src="images/p27.jpg" class="img-responsive"  alt="">-->
<!--                                    </div>-->
                                </a>
                            </figure>
                        </div>
                        <div class="ribben1">
                            <p>SALE</p>
                        </div>
                        <div class="block">
                            <div class="starbox small ghosting"> </div>
                        </div>
                        <div class="women">
                            <h6><a href="single.html"><?= $sale->name ?></a></h6>
                            <p ><?php if((float)($sale->old_price)): ?>
                                    <del> <?= $sale->old_price ?> </del>
                                    /
                                <?php endif; ?>
                                <em class="price"><?= $sale->price?></em>
                                <em class="rub"> Р</em></p>
                            <a href="<?= \yii\helpers\Url::to(['card/add', 'id' => $sale['id']]) ?>" data-text="Add To Cart" class="my-cart-b item_add">Добавить в корзину</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <div class="clearfix"></div>

                <?= LinkPager::widget([
                        'pagination' => $pages,
                        'maxButtonCount' => 3,
                ])?>

            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
<div class="clearfix"></div>
