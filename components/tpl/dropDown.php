<?php

use yii\helpers\Url;

?>

<li <?php if(isset($category['children'])) echo 'class="dropdown"'  ?>>

    <a  <?php if($category['parent_id']) : ?>

            href="<?= Url::to(['category/view', 'category_id' => $category['id']])?>"
        <?php endif; ?>
        <?php if(isset($category['children']))
            echo 'class="dropdown-toogle" data-toggle="dropdown" style="cursor: pointer"' ?>>
        <?= $category['name'] ?>

        <?php if(isset($category['children'])) echo  '<b class="caret"></b>' ?>
    </a>

    <?php if(isset($category['children'])): ?>

    <ul class="dropdown-menu multi-column columns-3" >
        <div class="row">
            <div class=" multi-gd-img">
                <li id="my_dropdown"class="multi-column-dropdown">
                    <?= $this->getMenuHtml($category['children']) ?>
                </li>
<!--            </div>-->
<!--            <div class="col-sm-3  multi-gd-img">-->
<!--                <a href="products.html"><img src="images/woo.jpg" alt=" "/></a>-->
<!--            </div>-->
<!--            <div class="col-sm-3  multi-gd-img">-->
<!--                <a href="products.html"><img src="images/woo1.jpg" alt=" "/></a>-->
<!--            </div>-->
            <div class="clearfix"></div>
        </div>
    </ul>
<!--    123-->
    <?php endif; ?>
</li>


