<ul class="nav navbar-nav">
    <!--                    dropDownWidget-->
    <?= \app\components\DropDownWidget::widget([
        'tpl' => 'dropDown',
//                'ul_class' => 'nav navbar-nav nav_1'
    ])?>
    <!--                    dropDownWidget-->

    <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Men <b class="caret"></b></a>
    <ul class="dropdown-menu multi-column columns-3">
        <div class="row">
            <div class="col-sm-3  multi-gd-img">
                <ul class="multi-column-dropdown">
                    <h6>Submenu1</h6>
                    <li><a href="products.html">Clothing</a></li>
                    <li><a href="products.html">Wallets</a></li>
                    <li><a href="products.html">Shoes</a></li>
                    <li><a href="products.html">Watches</a></li>
                    <li><a href="products.html"> Underwear </a></li>
                    <li><a href="products.html">Accessories</a></li>
                </ul>
            </div>
            <div class="col-sm-3  multi-gd-img">
                <ul class="multi-column-dropdown">
                    <h6>Submenu2</h6>
                    <li><a href="products.html">Sunglasses</a></li>
                    <li><a href="products.html">Wallets,Bags</a></li>
                    <li><a href="products.html">Footwear</a></li>
                    <li><a href="products.html">Watches</a></li>
                    <li><a href="products.html">Accessories</a></li>
                    <li><a href="products.html">Jewellery</a></li>
                </ul>
            </div>
            <div class="col-sm-3  multi-gd-img">
                <a href="products1.html"><img src="images/woo3.jpg" alt=" "/></a>
            </div>
            <div class="col-sm-3  multi-gd-img">
                <a href="products1.html"><img src="images/woo4.jpg" alt=" "/></a>
            </div>
            <div class="clearfix"></div>
        </div>
    </ul>
    </li>
</ul>