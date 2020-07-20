<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

?>

<div class="content">
    <div class="container">
        <?php if(isset($productSale)): ?>
            <div class="new-arrivals-w3agile">
                <h2 class="tittle">Распродажа</h2>
                <?php foreach ($productSale as $sale): ?>
                <div class="arrivals-grids">
                    <div class="col-md-3 arrival-grid simpleCart_shelfItem">
                        <div class="grid-arr">
                            <div  class="grid-arrival">
                                <figure>
                                    <a data-id="<?= $sale->id ?>" type="button" class="get-modal-product new-gri" data-toggle="modal" data-target="#myModalSingle">
                                        <div class="grid-img">
                                            <img  src="<?= \yii\helpers\Url::to(["@web/product_img/{$sale->img}", ['alt' => Html::encode($sale->name)]]) ?>" class="img-responsive">
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
                                <h6><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $sale['id']])?>"><?= $sale->name ?></a></h6>
                                <p><?php if(!empty($sale->old_price)): ?>
                                        <del> <?= $sale->old_price ?> </del>
                                        <span>/</span>
                                    <?php endif; ?>
                                    <em class="price"><?= $sale->price?></em>
                                    <em class="rub"> Р</em></p>
                                <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $sale->id])?>" data-id="<?= $sale->id ?>" data-text="Add To Cart" class="button add-to-cart my-cart-b">Добавить в корзину</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <div class="clearfix"></div>

                    <!--            --><?//= LinkPager::widget([
                    //                'pagination' => $pages,
                    //                'maxButtonCount' => 3,
                    //            ])?>

                </div>
                <div class="clearfix"></div>
            </div>
        <?php endif; ?>
        <div class="single-wl3">
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
                            <?php if( !empty($product['is_new']) ) :?>
                                <div class="ribben my_ribben">
                                    <p>NEW</p>
                                </div>
                            <?php endif; ?>
                            <?php if( !empty($product['is_hit']) ) :?>
                                <div class="ribben2 my_ribben">
                                    <p>HIT</p>
                                </div>
                            <?php endif; ?>
                            <?php if( !empty($product['is_sale']) ) :?>
                                <div class="ribben1 my_ribben">
                                    <p>SALE</p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="single-right simpleCart_shelfItem">
                            <h4><?= $product->name ?></h4>
                            <div class="color-quality">
                                <h6><span>Фирма: </span><?= $product->brand->name?></h6>
                            </div>
<!--                            <div class="block">-->
<!--                                <div class="starbox small ghosting"> </div>-->
<!--                            </div>-->
                            <p class="price item_price">
                                <span>
                                    Цена:
                                </span>
                                <?php if((float)($product->old_price)): ?>
                                    <del> <?= $product->old_price ?> </del>
                                    <span>/</span>
                                <?php endif; ?>
                                <em class="price"><?= $product->price ?></em>
                                <em class="rub"> Р</em></p>
                            <div class="description">
                                <p><span>Описание  : </span> <?= $product->content ?></p>
                            </div>
                            <div class="color-quality">
                                <h6><span>Количество :</span></h6>
                                <div class="quantity">
                                    <div class="quantity-select">
                                        <div class="entry value-minus1"><span></span></div>
                                        <div id="rez" class="entry value1"><span>1</span></div>
                                        <div class="entry value-plus1 active"><span></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="women">
                                <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $product->id])?>"  data-id="<?= $product->id ?>" data-text="Add To Cart" class="button add-to-cart-single my-cart-b">Добавить в корзину</a>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    <!--single-->

</div>
</div>

