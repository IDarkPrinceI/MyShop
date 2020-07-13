<?php

use yii\helpers\Url;

?>
<div id="my_modal_product" class=" new-grid1">
        <img  src="<?= Url::to(["@web/product_img/{$modalProduct->img}", ['alt' => $modalProduct->name, ] ]) ?>" class="img-responsive">
</div>
<div id="my_modal_new-grid" class="new-grid">
    <h5><?= $modalProduct->name ?></h5>
    <hr>
    <span id="my_modal_content"><?= $modalProduct->content ?></span>
    <h6>Бренд: <?= $modalProduct->brand->name?></h6>
    <hr>
        <h6>Количество :</h6>
        <div class="quantity">
            <div class="quantity-select">
                <div class="entry value-minus1">&nbsp;</div>
                <div class="entry value1"><span>1</span></div>
                <div class="entry value-plus1 active">&nbsp;</div>
            </div>
        </div>
    <hr>
            <h6>Цена:
                <?php if(!empty($modalProduct->old_price)): ?>
                    <del> <?= $modalProduct->old_price ?> </del>
                    <span>/</span>
                <?php endif; ?>
                <em class="price"><?= $modalProduct->price?></em>
                <em class="rub"> Р</em>
            </h6>
</div>
<div id="my_modal_add_to_cart" class="add">
    <a href="<?= Url::to(['cart/add', 'id' => $modalProduct->id])?>" class="button add-to-cart my-cart-b">Добавить в корзину</a>
<!--    <a href="--><?//= \yii\helpers\Url::to(['cart/add', 'id' => $modalProduct->id])?><!--" data-id="--><?//= $modalProduct->id ?><!--" data-text="Add To Cart" class="button add-to-cart my-cart-b"></a>-->
</div>
<div class="clearfix"> </div>


