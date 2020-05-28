








<?php debug ($category) ?>
<li <?php if(isset($category['children'])) ?>><input type="checkbox" id="<?= $i?>" /><label for="<?= $i?>"><span></span><?= $category['name'] ?></label>
    <ul>
        <li <?php if(isset($category['children'])):  ?>
            <?= $this->getMenuHtml($category['children'], $i) ?>
            <?php endif; ?>
        </li>
    </ul>
</li>



Варианты

<li <?php if(isset($category['children'])) ?>><input type="checkbox" id="item-0" /><label for="item-0"><span></span><?= $category['name'] ?></label>
    <ul>
        <li <?php if(isset($category['children'])):  ?>
            <?= $this->getMenuHtml($category['children']) ?>>
            <?php endif; ?>
        </li>
    </ul>
</li>


<li <?php if(isset($category['children'])) echo 'class="dropdown"' ?>>
    <a <?php if(isset($category['children']))
        echo 'class="dropdown-toogle" data-toggle="dropdown" style="cursor: pointer"' ?>>
        <?= $category['name'] ?>
    </a>
    <?php if(isset($category['children'])): ?>
        <ul class="dropdown-menu multi-column columns-3">
            <?= $this->getMenuHtml($category['children']) ?>
        </ul>
    <?php endif; ?>
</li>



<?php $i = 0?>

<li <?php if(isset($category['children'])) ?>><input type="checkbox"  id="<?= $i?>" /><label for="<?= $i?>"><span></span><?= $category['name'] ?></label>
    <ul>
        <li><input type="checkbox" id="item-0-0" /><label for="item-0-0">Ethnic Wear</label>
            <ul>
                <li><a href="products.html">Shirts</a></li>
                <li><a href="products.html">Caps</a></li>
                <li><a href="products.html">Shoes</a></li>
                <li><a href="products.html">Pants</a></li>
                <li><a href="products.html">SunGlasses</a></li>
                <li><a href="products.html">Trousers</a></li>
            </ul>
        </li>
    </ul>
</li>

<?php debug ($category) ?>
<li <?php if(isset($category['children'])) ?>><input type="checkbox" id="<?= $i?>" /><label for="<?= $i?>"><span></span><?= $category['name'] ?></label>
    <ul>
        <li <?php if(isset($category['children'])):  ?>
            <?= $this->getMenuHtml($category['children'], $i) ?>
        <?php endif; ?>
        </li>
    </ul>
</li>