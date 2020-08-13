<?php

use yii\widgets\LinkPager;
use yii\helpers\Url;

?>
<?php //debug($productBrand);?>
<!--brendcrumbs-->
<!--<div class="banner1">-->
<!--    <div class="container">-->
<!--        <h3><a href="index.html">Home</a> / <span>Products</span></h3>-->
<!--    </div>-->
<!--</div>-->
<!--brendcrumbs-->
<!--content-->
<?php //debug($data) ?>
<div class="content" id="my_content">
    <div class="products-agileinfo">
        <div class="container">
            <h2 class="tittle"><?= $category['name'] ?>
                <?php if( isset($brandName) ) : ?>
                <span>/</span>
                    <?= $brandName->name ?>
                <?php endif; ?>
                <?php if( (isset($range) )) : ?>
                <span>/ цена до: </span>
                    <?= $range ?>
                <?php endif; ?>
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
                                <div>
<!--                                    <form action="--><?//= Url::to(['category/view', 'category_id' => $category['id']])?><!--" method="get">-->
                                        <input id="my_range" name="range" type="text" placeholder="Цена до...">
<!--                                        <input id="my_range_button"type="submit" value="Отфильтровать"-->
                                    </form>
                                </div>
                        </ul>
                    </div>
                    <div id="filterForm" class="brand-w3l">
                        <h3>Фирма</h3>
                        <?php foreach ($productsBrand as $brand): ?>
                            <li>
                                <ul class="brandName" data-id="<?= $brand['id'] ?>"><?= $brand['name']?></ul>
                            </li>
                        <?php endforeach; ?>
                        <button id="filterButton" class="button my-cart-b filter" value="<?= $category['id'] ?>">Отфильтровать</button>
                    </div>
<!--                    <div class="cat-img">-->
<!--                        <img class="img-responsive " src="/images/45.jpg" alt="">-->
<!--                    </div>-->
                </div>
                <div class="col-md-9 product-agileinfon-grid1 w3l">

                        <?= $this->render('include', compact('renderProducts'))?>

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
