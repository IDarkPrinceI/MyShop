

<li <?php if(isset($category['children'])) echo 'class="dropdown"'  ?>>
    <a  <?php if($category['parent_id']) : ?>

            href="<?= \yii\helpers\Url::to(['category/view', 'id' => $category['id']])?>"
        <?php endif; ?>
        <?php if(isset($category['children']))
            echo 'class="dropdown-toogle" data-toggle="dropdown" style="cursor: pointer"' ?>>
        <?= $category['name'] ?>
        <?php if(isset($category['children'])) echo '<b class="caret"></b>' ?>
    </a>
    <?php if(isset($category['children'])): ?>
    <ul class="dropdown-menu multi-column columns-3">
        <div class="row">
            <div class=" multi-gd-img">
                <ul class="multi-column-dropdown">
                    <?= $this->getMenuHtml($category['children']) ?>
                </ul>
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
    <?php endif; ?>
</li>