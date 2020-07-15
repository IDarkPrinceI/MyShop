<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div id="my_modal_product" class=" new-grid1">
<!--        <img  src="--><?//= Url::to(["@web/product_img/{$modalProduct->img}", ['alt' => $modalProduct->name, ] ]) ?><!--" class="img-responsive">-->
        <img  src="<?= Url::to(["@web/product_img/{$modalProduct->img}", ['alt' => Html::encode($modalProduct->name), ] ]) ?>" class="img-responsive">
    <?php if( !empty($modalProduct['is_new']) ) :?>
        <div class="ribben my_ribben">
            <p>NEW</p>
        </div>
    <?php endif; ?>
    <?php if( !empty($modalProduct['is_hit']) ) :?>
        <div class="ribben2 my_ribben">
            <p>HIT</p>
        </div>
    <?php endif; ?>
    <?php if( !empty($modalProduct['is_sale']) ) :?>
        <div class="ribben1 my_ribben">
            <p>SALE</p>
        </div>
    <?php endif; ?>
</div>
<div id="my_modal_new-grid" class="new-grid">
    <h5><?= $modalProduct->name ?></h5>
    <hr>
    <div id="my_modal_content"><span>Описание: </span><?= $modalProduct->content ?></div>
    <h6><span>Бренд: </span><?= $modalProduct->brand->name?></h6>
    <hr>
        <h6><span>Количество :</span></h6>
        <div class="quantity">
            <div class="quantity-select">
                <div class="entry value-minus1"><span></span></div>
                <div id="rez" class="entry value1"><span>1</span></div>
                <div class="entry value-plus1 active"><span></span></div>
            </div>
        </div>
    <hr>
            <h6><span>Цена:</span>
                <?php if(!empty($modalProduct->old_price)): ?>
                    <del> <?= $modalProduct->old_price ?> </del>
                    <span>/</span>
                <?php endif; ?>
                <em class="price"><?= $modalProduct->price?></em>
                <em class="rub"> Р</em>
            </h6>
</div>
<div id="my_modal_add_to_cart" class="add">
    <a href="<?= Url::to(['cart/add', 'id' => $modalProduct->id]) ?>" data-id="<?= $modalProduct->id ?>" class="button add-to-cart-single my-cart-b">Добавить в корзину</a>
</div>
<div class="clearfix"> </div>


