<?php

use yii\helpers\Url;

?>
<!--banner-->
<div class="container">
    <div class="banner-w3">
        <div class="demo-1">
            <div id="example1" class="core-slider core-slider__carousel example_1">
                <div class="core-slider_viewport">
                    <div class="core-slider_list">
                        <div class="core-slider_item">
<!--                            <a href="https://google.com">-->
                            <img src="<?= Url::to(["/images/slider/1.jpg"]) ?>" class="img-responsive" alt="">

                        </div>
                        <div class="core-slider_item">
                            <img src="<?= Url::to(["/images/slider/2.jpg"]) ?>" class="img-responsive" alt="">
                        </div>
                        <div class="core-slider_item">
                            <img src="<?= Url::to(["/images/slider/3.jpg"]) ?>" class="img-responsive" alt="">
                        </div>
<!--                        <div class="core-slider_item">-->
<!--                            <img src="--><?//= Url::to(["/images/b4.jpg"]) ?><!--" class="img-responsive" alt="">-->
<!--                        </div>-->
                    </div>
                </div>
                <div class="core-slider_nav">
                    <div class="core-slider_arrow core-slider_arrow__right" id = "my_arrow_right"></div>
                    <div class="core-slider_arrow core-slider_arrow__left" id = "my_arrow_left"></div>
                </div>
                <div class="core-slider_control-nav"></div>
            </div>
        </div>
    </div>
</div>
<!--banner-->

<div class="content">
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
                                <a data-id="<?= $new->id ?>" type="button" class="get-modal-product new-gri" data-toggle="modal" data-target="#myModalSingle">
                                    <div class="grid-img">
                                        <img  src="<?= Url::to(["@web/product_img/{$new->img}"]) ?>" class="img-responsive" alt="">
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
                            <h6><a href="<?= Url::to(['product/view', 'id' => $new['id']]) ?>"><?=$new->name ?></a></h6>
                            <p><?php if(!empty($new->old_price)): ?>
                                    <del> <?= $new->old_price ?> </del>
                                    <span>/</span>
                                <?php endif; ?>
                                <em class="price"><?= $new->price?></em>
                                <em class="rub"> Р</em></p>
                            <a href="<?= Url::to(['cart/add', 'id' => $new->id])?>" data-id="<?= $new->id ?>" data-text="Add To Cart" class="button add-to-cart my-cart-b">Добавить в корзину</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    <div class="clearfix"></div>

<!--        --><?//=  LinkPager::widget([
//            'pagination' => $pagesNew,
//            'maxButtonCount' => 3,
//        ]); ?>

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
                                <a data-id="<?= $hit->id ?>" type="button" class="get-modal-product new-gri" data-toggle="modal" data-target="#myModalSingle">
                                    <div class="grid-img">
                                        <img  src="<?= Url::to(["@web/product_img/{$hit->img}"])?>" class="img-responsive" alt="">
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
                            <h6><a href="<?= Url::to(['product/view', 'id' => $hit['id']])?>"><?= $hit->name?></a></h6>
                            <p><?php if(!empty($hit->old_price)): ?>
                                    <del> <?= $hit->old_price ?> </del>
                                    <span>/</span>

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

<!--                --><?//= LinkPager::widget([
//                        'pagination' => $pagesHit,
//                        'maxButtonCount' => 3,
//                ])?>

</div>
