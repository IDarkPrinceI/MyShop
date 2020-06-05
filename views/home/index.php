<?php

use yii\widgets\LinkPager;
use yii\widgets\Pjax;

?>
<!--banner-->
<!--<div class="container">-->
<!--    <div class="banner-w3">-->
<!--        <div class="demo-1">-->
<!--            <div id="example1" class="core-slider core-slider__carousel example_1">-->
<!--                <div class="core-slider_viewport">-->
<!--                    <div class="core-slider_list">-->
<!--                        <div class="core-slider_item">-->
<!--                            <img src="--><?//= \yii\helpers\Url::to(["/images/b1.jpg"]) ?><!--" class="img-responsive" alt="">-->
<!--                        </div>-->
<!--                        <div class="core-slider_item">-->
<!--                            <img src="--><?//= \yii\helpers\Url::to(["/images/b2.jpg"]) ?><!--" class="img-responsive" alt="">-->
<!--                        </div>-->
<!--                        <div class="core-slider_item">-->
<!--                            <img src="--><?//= \yii\helpers\Url::to(["/images/b3.jpg"]) ?><!--" class="img-responsive" alt="">-->
<!--                        </div>-->
<!--                        <div class="core-slider_item">-->
<!--                            <img src="--><?//= \yii\helpers\Url::to(["/images/b4.jpg"]) ?><!--" class="img-responsive" alt="">-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="core-slider_nav">-->
<!--                    <div class="core-slider_arrow core-slider_arrow__right" id = "my_arrow_right"></div>-->
<!--                    <div class="core-slider_arrow core-slider_arrow__left" id = "my_arrow_left"></div>-->
<!--                </div>-->
<!--                <div class="core-slider_control-nav"></div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--banner-->

<div class="content">
    <!--    --><?//= debug($productNew) ?>

    <?php if(!empty($productNew)) :?>
    <div class="new-arrivals-w3agile">
        <div class="container">
            <h2 class="tittle" >Новые товары</h2>
            <?php foreach ($productNew as $new): ?>
            <div class="arrivals-grids">
                <div class="col-md-3 arrival-grid simpleCart_shelfItem">
                    <div class="grid-arr">
                        <div  class="grid-arrival">
                            <figure>
                                <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $new['id']]) ?>" class="new-gri" data-toggle="modal">
                                    <div class="grid-img">
                                        <img  src="<?= \yii\helpers\Url::to(["@web/product_img/{$new->img}"]) ?>" class="img-responsive" alt="">
                                    </div>
<!--                                    <div class="grid-img">-->
                                        <!--                                        <img  src="images/p5.jpg" class="img-responsive"  alt="">-->
<!--                                    </div>-->
                                </a>
                            </figure>
                        </div>
                        <div class="ribben">
                            <p>NEW</p>
                        </div>
                        <div class="block">
                            <div class="starbox small ghosting"> </div>
                        </div>
                        <div class="women">
                            <h6><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $new['id']]) ?>"><?=$new->name ?></a></h6>
                            <p ><?php if((float)($new->old_price)): ?>
                                    <del> <?= $new->old_price ?> </del>
                                    /
                                <?php endif; ?>
                                <em class="price"><?= $new->price?></em>
                                <em class="rub"> Р</em></p>
                            <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $new->id])?>" data-id="<?= $new->id ?>" data-text="Add To Cart" class="button add-to-cart my-cart-b">Добавить в корзину</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    <div class="clearfix"></div>

        <?=  LinkPager::widget([
            'pagination' => $pagesNew,
            'maxButtonCount' => 3,
        ]); ?>

    <?php if(!empty($productHit)): ?>
    <div class="new-arrivals-w3agile">
        <div class="container">
            <h2 class="tittle">Хиты продаж</h2>
            <?php foreach ($productHit as $hit): ?>
            <div class="arrivals-grids">
                <div class="col-md-3 arrival-grid simpleCart_shelfItem">
                    <div class="grid-arr">
                        <div  class="grid-arrival">
                            <figure>
                                <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit['name']])?>">
                                    <div class="grid-img">
                                        <img  src="<?= \yii\helpers\Url::to(["@web/product_img/{$hit->img}"])?>" class="img-responsive" alt="">
                                    </div>
<!--                                    <div class="grid-img">-->
<!--                                        <img  src="images/p27.jpg" class="img-responsive"  alt="">-->
<!--                                    </div>-->
                                </a>
                            </figure>
                        </div>
                        <div class="ribben2">
                            <p>HIT</p>
                        </div>
                        <div class="block">
                            <div class="starbox small ghosting"> </div>
                        </div>
                        <div class="women">
                            <h6><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit['name']])?>"><?= $hit->name?></a></h6>
                            <p ><?php if((float)($hit->old_price)): ?>
                                    <del> <?= $hit->old_price ?> </del>
                                    /
                                <?php endif; ?>
                                <em class="price"><?= $hit->price?></em>
                                <em class="rub"> Р</em></p>
                            <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $hit->id])?>" data-id="<?= $hit->id ?>" data-text="Add To Cart" class="button add-to-cart my-cart-b">Добавить в корзину</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    <div class="clearfix"></div>

                <?= LinkPager::widget([
                        'pagination' => $pagesHit,
                        'maxButtonCount' => 3,
                ])?>

</div>
