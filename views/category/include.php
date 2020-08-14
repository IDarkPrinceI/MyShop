<?php use yii\helpers\Url; ?>


<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
    <ul id="myIncludeProductList" class="nav1 nav1-tabs left-tab" role="tablist">
        <div id="myTabContent" class="tab-content">
            <?php foreach ($renderProducts as $product) :?>
                <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                    <div class="product-tab">
                        <div class="col-md-4 product-tab-grid simpleCart_shelfItem">
                            <div class="grid-arr">
                                <div  class="grid-arrival">
                                    <figure>
                                        <a data-id="<?= $product->id ?>" type="button" class="get-modal-product new-gri" data-toggle="modal" data-target="#myModalSingle">
                                            <div class="grid-img">
                                                <img src="<?= Url::to(["@web/product_img/{$product->img}", ['alt' => $product->name ] ]) ?>" class="img-responsive">
                                            </div>
                                            <!--                                                            <div class="grid-img">-->
                                            <!--                                                                <img  src="/images/p22.jpg" class="img-responsive"  alt="">-->
                                            <!--                                                            </div>-->
                                        </a>
                                    </figure>
                                </div>
                                <?php if( !empty($product['is_new']) ) :?>
                                    <div class="ribben">
                                        <p>NEW</p>
                                    </div>
                                <?php endif; ?>
                                <?php if( !empty($product['is_hit']) ) :?>
                                    <div class="ribben2">
                                        <p>HIT</p>
                                    </div>
                                <?php endif; ?>
                                <?php if( !empty($product['is_sale']) ) :?>
                                    <div class="ribben1">
                                        <p>SALE</p>
                                    </div>
                                <?php endif; ?>
                                <div class="block">
                                    <div class="starbox small ghosting"> </div>
                                </div>
                                <div class="women">
                                    <h6><a href="<?= Url::to(['product/view', 'id' => $product->id]) ?>"><?= $product->name ?></a></h6>
                                    <p>
                                        <?php if(!empty($product->old_price)): ?>
                                            <del> <?= $product->old_price ?> </del>
                                            <span>/</span>
                                        <?php endif; ?>
                                        <em class="price"><?= $product->price?></em>
                                        <em class="rub"> Р</em>
                                    </p>
                                    <a href="<?= Url::to(['cart/add', 'id' => $product->id])?>" data-id="<?= $product->id ?>" data-text="Add To Cart" class="button add-to-cart my-cart-b">Добавить в корзину</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!--modalProduct-->
<!--        <div class="modal fade" id="myModalSingle" tabindex="-1" role="dialog">-->
<!--            <div class="modal-dialog" role="document">-->
<!--                <div class="modal-content modal-info">-->
<!--                    <div class="modal-header">-->
<!--                        <h4>Быстрый просмотр</h4>-->
<!--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
<!--                    </div>-->
<!--                    <div class="modal-body">-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
        <!--modalProduct-->
</div>
