<?php

use yii\helpers\Url;

?>
<div id="my_modal_product" class=" new-grid1">
        <img  src="<?= Url::to(["@web/product_img/{$modalProduct->img}", ['alt' => $modalProduct->name, ] ]) ?>" class="img-responsive">
</div>
<div class="new-grid">
    <h5><?= $modalProduct->name ?></h5>
    <span id="my_modal_content"><?= $modalProduct->content ?></span>
    <div class="color-quality-right">
        <h6>Количество :</h6>
        <div class="quantity">
            <div class="quantity-select">
                <div class="entry value-minus1">&nbsp;</div>
                <div class="entry value1"><span>1</span></div>
                <div class="entry value-plus1 active">&nbsp;</div>
            </div>
        </div>
        <div class="my_modal_price">
            <p>
                <?php if(!empty($modalProduct->old_price)): ?>
                    <del> <?= $modalProduct->old_price ?> </del>
                    <span>/</span>
                <?php endif; ?>
                <em class="price"><?= $modalProduct->price?></em>
                <em class="rub"> Р</em>
            </p>
        </div>
    </div>
</div>
<div class="clearfix"> </div>
<div class="add">
    <button class="btn btn-danger my-cart-btn my-cart-b" data-id="3" data-name="Kabuli Chana" data-summary="summary 3" data-price="2.00" data-quantity="1" data-image="images/of2.png">Добавить в корзину</button>
</div>

