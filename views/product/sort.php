<?php

use yii\widgets\LinkPager;
use yii\helpers\Url;

?>
<?php //debug($brandProducts);?>
<!--brendcrumbs-->
<!--<div class="banner1">-->
<!--    <div class="container">-->
<!--        <h3><a href="index.html">Home</a> / <span>Products</span></h3>-->
<!--    </div>-->
<!--</div>-->
<!--brendcrumbs-->
<!--content-->
<div class="content" id="my_content">
    <div class="products-agileinfo">
        <div class="container">
            <?php foreach ($renderProductsToBrand as $product) ?>
            <h2 class="tittle">
                <a id="my_title_link" href="<?= Url::to(['category/view', 'category_id' => $product->category['id']])?>"><?= $product->category->name ?></a>
                <span> / </span>
                <?= $product->brand->name ?>
            </h2>
            <div class="product-agileinfo-grids w3l">
                <div class="col-md-3 product-agileinfo-grid">
                    <div class="categories">
                        <ul class="tree-list-pad">
                            <h3>Категории</h3>
                            <?= \app\components\DropDownWidget::widget([
                                'tpl' => 'menuCategory',
                            ]) ?>
                        </ul>
                    </div>
                    <div class="price">
                        <h3>Диапазон цены</h3>
                        <ul class="dropdown-menu6">
                            <div >
                                <form action="<?= Url::to(['category/view', 'category_id' => $category['id']])?>" method="get">
                                    <input id="my_range" name="range" type="text" placeholder="Цена от...">
                                    <!--                                        --><?//= Html::a('Создать', ['category/view', 'category_id' => $category['id']], ['class' => 'btn btn-success']) ?>
                                </form>
                            </div>
                        </ul>
                    </div>
                    <!--                    <div class="cat-img">-->
                    <!--                        <img class="img-responsive " src="/images/45.jpg" alt="">-->
                    <!--                    </div>-->
                </div>
                <div class="col-md-9 product-agileinfon-grid1 w3l">
                    <!--                    <div class="product-agileinfon-top">-->
                    <!--                        <div class="col-md-6 product-agileinfon-top-left">-->
                    <!--                            <img class="img-responsive " src="/images/img1.jpg" alt="">-->
                    <!--                        </div>-->
                    <!--                        <div class="col-md-6 product-agileinfon-top-left">-->
                    <!--                            <img class="img-responsive " src="/images/img2.jpg" alt="">-->
                    <!--                        </div>-->
                    <!--                        <div class="clearfix"></div>-->
                    <!--                    </div>-->
                    <div class="mens-toolbar">
                        <p >Showing 1–9 of 21 results</p>
                        <!--                        --><?php //echo $sort->link('name')  . '|' . $sort->link('price')?>
                        <p class="showing">Сортировать:
                            <?php echo $sort->link('name')  . '|' . $sort->link('price')?>
                            <!--                            <form method="get" id="MyForm">-->
                            <!--                            <select name="val" onchange="document.getElementById('MyForm').submit()">-->
                            <!--                            <select name="sort" id="sort">-->
                            <!--                                <option value="--><?// $sort->link('name') ?><!--">Цена</option>-->
                            <!--                                <option value="--><?// $sort->link('price') ?><!--">Имя</option>-->
                            <!--                            </select>-->
                            <!--                        </form>-->
                        </p>
                        <p>Show
                            <select>
                                <option value=""> 9</option>
                                <option value="">  10</option>
                                <option value=""> 11 </option>
                                <option value=""> 12 </option>
                            </select>
                        </p>
                        <div class="clearfix"></div>
                    </div>
                    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav1 nav1-tabs left-tab" role="tablist">
                            <div id="myTabContent" class="tab-content">
                                <?php foreach ($renderProductsToBrand as $product) :?>
                                    <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                                        <div class="product-tab">
                                            <div class="col-md-4 product-tab-grid simpleCart_shelfItem">
                                                <div class="grid-arr">
                                                    <div  class="grid-arrival">
                                                        <figure>
                                                            <a href="<?= Url::to(['product/view', 'id' => $product['id']]) ?>" class="new-gri" >
                                                                <div class="grid-img">
                                                                    <img  src="<?= Url::to(["@web/product_img/{$product->img}", ['alt' => $product->name, ] ]) ?>" class="img-responsive">
                                                                </div>
                                                                <!--                                                            <div class="grid-img">-->
                                                                <!--                                                                <img  src="/images/p22.jpg" class="img-responsive"  alt="">-->
                                                                <!--                                                            </div>-->
                                                            </a>
                                                        </figure>
                                                    </div>
                                                    <div class="block">
                                                        <div class="starbox small ghosting"> </div>
                                                    </div>
                                                    <div class="women">
                                                        <h6><a href="<?= Url::to(['product/view', 'id' => $product['id']]) ?>"><?= $product->name ?></a></h6>
                                                        <p >
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
                    </div>
                    <div class="clearfix"> </div>
                    <?= LinkPager::widget([
                            'pagination' => $pages,
                            'maxButtonCount' => 3,
                    ])?>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</div>
<!--content-->
