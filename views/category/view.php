<?php //debug($products) ?>

<!--brendcrumbs-->
<div class="banner1">
    <div class="container">
        <h3><a href="index.html">Home</a> / <span>Products</span></h3>
    </div>
</div>
<!--brendcrumbs-->
<!--content-->
<div class="content" id="my_content">
    <div class="products-agileinfo">
        <?php foreach ($products as $product) ?>
        <h2 class="tittle"><?= $category->name ?></h2>
        <div class="container">
            <div class="product-agileinfo-grids w3l">
                <div class="col-md-3 product-agileinfo-grid">
                    <div class="categories">
                        <ul class="tree-list-pad">
                            <h3>Категории</h3>
                            <?= \app\components\DropDownWidget::widget([
                                'tpl' => 'menuCategory'
                            ]) ?>
                        </ul>
                    </div>
                    <div class="price">
                        <h3>Price Range</h3>
                        <ul class="dropdown-menu6">
                            <li>
                                <div id="slider-range"></div>
                                <input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
                            </li>
                        </ul>
                    </div>
                    <div class="top-rates">
                        <h3>Top Rates products</h3>
                        <div class="recent-grids">
                            <div class="recent-left">
                                <a href="single.html"><img class="img-responsive " src="/images/r.jpg" alt=""></a>
                            </div>
                            <div class="recent-right">
                                <h6 class="best2"><a href="single.html">Lorem ipsum dolor </a></h6>
                                <p><del>$100.00</del> <em class="item_price">$09.00</em></p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="recent-grids">
                            <div class="recent-left">
                                <a href="single.html"><img class="img-responsive " src="/images/r1.jpg" alt=""></a>
                            </div>
                            <div class="recent-right">
                                <h6 class="best2"><a href="single.html">Duis aute irure </a></h6>
                                <p><del>$100.00</del> <em class="item_price">$19.00</em></p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="recent-grids">
                            <div class="recent-left">
                                <a href="single.html"><img class="img-responsive " src="/images/r2.jpg" alt=""></a>
                            </div>
                            <div class="recent-right">
                                <h6 class="best2"><a href="single.html">Lorem ipsum dolor </a></h6>
                                <p><del>$100.00</del> <em class="item_price">$39.00</em></p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="recent-grids">
                            <div class="recent-left">
                                <a href="single.html"><img class="img-responsive " src="/images/r3.jpg" alt=""></a>
                            </div>
                            <div class="recent-right">
                                <h6 class="best2"><a href="single.html">Ut enim ad minim </a></h6>
                                <p><em class="item_price">$39.00</em></p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="brand-w3l">
                        <h3>Brands Filter</h3>
                        <ul>
                            <li><a href="#">Ralph Lauren</a></li>
                            <li><a href="#">adidas</a></li>
                            <li><a href="#">Bottega Veneta</a></li>
                            <li><a href="#">Valentino</a></li>
                            <li><a href="#">Nike</a></li>
                            <li><a href="#">Burberry</a></li>
                            <li><a href="#">Michael Kors</a></li>
                            <li><a href="#">Louis Vuitton</a></li>
                            <li><a href="#">Jimmy Choo</a></li>
                        </ul>
                    </div>
                    <div class="cat-img">
                        <img class="img-responsive " src="/images/45.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-9 product-agileinfon-grid1 w3l">
<!--                    banner?-->
                    <div class="product-agileinfon-top">
                        <div class="col-md-6 product-agileinfon-top-left">
                            <img class="img-responsive " src="/images/img1.jpg" alt="">
                        </div>
                        <div class="col-md-6 product-agileinfon-top-left">
                            <img class="img-responsive " src="/images/img2.jpg" alt="">
                        </div>
                        <div class="clearfix"></div>
                        <!--                    banner?-->
                    </div>
                    <div class="mens-toolbar">
                        <p >Showing 1–9 of 21 results</p>
                        <p class="showing">Sorting By
                            <select>
                                <option value=""> Name</option>
                                <option value="">  Rate</option>
                                <option value=""> Color </option>
                                <option value=""> Price </option>
                            </select>
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
                            <ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
                                <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><img src="/images/menu1.png"></a></li>
                                <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile"><img src="/images/menu.png"></a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                                    <div class="product-tab">
                                        <div class="col-md-4 product-tab-grid simpleCart_shelfItem">
                                            <div class="grid-arr">
                                                <div  class="grid-arrival">
                                                    <figure>
                                                        <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
                                                            <div class="grid-img">
                                                                <img  src="/images/p6.jpg" class="img-responsive" alt="">
                                                            </div>
                                                            <div class="grid-img">
                                                                <img  src="/images/p5.jpg" class="img-responsive"  alt="">
                                                            </div>
                                                        </a>
                                                    </figure>
                                                </div>
                                                <div class="block">
                                                    <div class="starbox small ghosting"> </div>
                                                </div>
                                                <div class="women">
                                                    <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
                                                    <span class="size">XL / XXL / S </span>
                                                    <p ><del>$100.00</del><em class="item_price">$70.00</em></p>
                                                    <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 product-tab-grid simpleCart_shelfItem">
                                            <div class="grid-arr">
                                                <div  class="grid-arrival">
                                                    <figure>
                                                        <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
                                                            <div class="grid-img">
                                                                <img  src="/images/p21.jpg" class="img-responsive" alt="">
                                                            </div>
                                                            <div class="grid-img">
                                                                <img  src="/images/p22.jpg" class="img-responsive"  alt="">
                                                            </div>
                                                        </a>
                                                    </figure>
                                                </div>
                                                <div class="block">
                                                    <div class="starbox small ghosting"> </div>
                                                </div>
                                                <div class="women">
                                                    <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
                                                    <span class="size">XL / XXL / S </span>
                                                    <p ><del>$100.00</del><em class="item_price">$70.00</em></p>
                                                    <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 product-tab-grid simpleCart_shelfItem">
                                            <div class="grid-arr">
                                                <div  class="grid-arrival">
                                                    <figure>
                                                        <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
                                                            <div class="grid-img">
                                                                <img  src="/images/p14.jpg" class="img-responsive" alt="">
                                                            </div>
                                                            <div class="grid-img">
                                                                <img  src="/images/p13.jpg" class="img-responsive"  alt="">
                                                            </div>
                                                        </a>
                                                    </figure>
                                                </div>
                                                <div class="block">
                                                    <div class="starbox small ghosting"> </div>
                                                </div>
                                                <div class="women">
                                                    <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
                                                    <span class="size">XL / XXL / S </span>
                                                    <p ><del>$100.00</del><em class="item_price">$70.00</em></p>
                                                    <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
<!--                                    <div class="product-tab prod1">-->
<!--                                        <div class="col-md-4 product-tab-grid simpleCart_shelfItem">-->
<!--                                            <div class="grid-arr">-->
<!--                                                <div  class="grid-arrival">-->
<!--                                                    <figure>-->
<!--                                                        <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">-->
<!--                                                            <div class="grid-img">-->
<!--                                                                <img  src="/images/i2.jpg" class="img-responsive" alt="">-->
<!--                                                            </div>-->
<!--                                                            <div class="grid-img">-->
<!--                                                                <img  src="/images/i1.jpg" class="img-responsive"  alt="">-->
<!--                                                            </div>-->
<!--                                                        </a>-->
<!--                                                    </figure>-->
<!--                                                </div>-->
<!--                                                <div class="block">-->
<!--                                                    <div class="starbox small ghosting"> </div>-->
<!--                                                </div>-->
<!--                                                <div class="women">-->
<!--                                                    <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>-->
<!--                                                    <span class="size">XL / XXL / S </span>-->
<!--                                                    <p ><del>$100.00</del><em class="item_price">$70.00</em></p>-->
<!--                                                    <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="col-md-4 product-tab-grid simpleCart_shelfItem">-->
<!--                                            <div class="grid-arr">-->
<!--                                                <div  class="grid-arrival">-->
<!--                                                    <figure>-->
<!--                                                        <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">-->
<!--                                                            <div class="grid-img">-->
<!--                                                                <img  src="/images/i4.jpg" class="img-responsive" alt="">-->
<!--                                                            </div>-->
<!--                                                            <div class="grid-img">-->
<!--                                                                <img  src="/images/i3.jpg" class="img-responsive"  alt="">-->
<!--                                                            </div>-->
<!--                                                        </a>-->
<!--                                                    </figure>-->
<!--                                                </div>-->
<!--                                                <div class="block">-->
<!--                                                    <div class="starbox small ghosting"> </div>-->
<!--                                                </div>-->
<!--                                                <div class="women">-->
<!--                                                    <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>-->
<!--                                                    <span class="size">XL / XXL / S </span>-->
<!--                                                    <p ><del>$100.00</del><em class="item_price">$70.00</em></p>-->
<!--                                                    <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="col-md-4 product-tab-grid simpleCart_shelfItem">-->
<!--                                            <div class="grid-arr">-->
<!--                                                <div  class="grid-arrival">-->
<!--                                                    <figure>-->
<!--                                                        <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">-->
<!--                                                            <div class="grid-img">-->
<!--                                                                <img  src="/images/i6.jpg" class="img-responsive" alt="">-->
<!--                                                            </div>-->
<!--                                                            <div class="grid-img">-->
<!--                                                                <img  src="/images/i5.jpg" class="img-responsive"  alt="">-->
<!--                                                            </div>-->
<!--                                                        </a>-->
<!--                                                    </figure>-->
<!--                                                </div>-->
<!--                                                <div class="block">-->
<!--                                                    <div class="starbox small ghosting"> </div>-->
<!--                                                </div>-->
<!--                                                <div class="women">-->
<!--                                                    <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>-->
<!--                                                    <span class="size">XL / XXL / S </span>-->
<!--                                                    <p ><del>$100.00</del><em class="item_price">$70.00</em></p>-->
<!--                                                    <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="clearfix"></div>-->
<!--                                    </div>-->
<!--                                    <div class="product-tab">-->
<!--                                        <div class="col-md-4 product-tab-grid simpleCart_shelfItem">-->
<!--                                            <div class="grid-arr">-->
<!--                                                <div  class="grid-arrival">-->
<!--                                                    <figure>-->
<!--                                                        <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">-->
<!--                                                            <div class="grid-img">-->
<!--                                                                <img  src="/images/i8.jpg" class="img-responsive" alt="">-->
<!--                                                            </div>-->
<!--                                                            <div class="grid-img">-->
<!--                                                                <img  src="/images/i7.jpg" class="img-responsive"  alt="">-->
<!--                                                            </div>-->
<!--                                                        </a>-->
<!--                                                    </figure>-->
<!--                                                </div>-->
<!--                                                <div class="block">-->
<!--                                                    <div class="starbox small ghosting"> </div>-->
<!--                                                </div>-->
<!--                                                <div class="women">-->
<!--                                                    <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>-->
<!--                                                    <span class="size">XL / XXL / S </span>-->
<!--                                                    <p ><del>$100.00</del><em class="item_price">$70.00</em></p>-->
<!--                                                    <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="col-md-4 product-tab-grid simpleCart_shelfItem">-->
<!--                                            <div class="grid-arr">-->
<!--                                                <div  class="grid-arrival">-->
<!--                                                    <figure>-->
<!--                                                        <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">-->
<!--                                                            <div class="grid-img">-->
<!--                                                                <img  src="/images/i10.jpg" class="img-responsive" alt="">-->
<!--                                                            </div>-->
<!--                                                            <div class="grid-img">-->
<!--                                                                <img  src="/images/i9.jpg" class="img-responsive"  alt="">-->
<!--                                                            </div>-->
<!--                                                        </a>-->
<!--                                                    </figure>-->
<!--                                                </div>-->
<!--                                                <div class="block">-->
<!--                                                    <div class="starbox small ghosting"> </div>-->
<!--                                                </div>-->
<!--                                                <div class="women">-->
<!--                                                    <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>-->
<!--                                                    <span class="size">XL / XXL / S </span>-->
<!--                                                    <p ><del>$100.00</del><em class="item_price">$70.00</em></p>-->
<!--                                                    <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="col-md-4 product-tab-grid simpleCart_shelfItem">-->
<!--                                            <div class="grid-arr">-->
<!--                                                <div  class="grid-arrival">-->
<!--                                                    <figure>-->
<!--                                                        <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">-->
<!--                                                            <div class="grid-img">-->
<!--                                                                <img  src="/images/i12.jpg" class="img-responsive" alt="">-->
<!--                                                            </div>-->
<!--                                                            <div class="grid-img">-->
<!--                                                                <img  src="/images/i11.jpg" class="img-responsive"  alt="">-->
<!--                                                            </div>-->
<!--                                                        </a>-->
<!--                                                    </figure>-->
<!--                                                </div>-->
<!--                                                <div class="block">-->
<!--                                                    <div class="starbox small ghosting"> </div>-->
<!--                                                </div>-->
<!--                                                <div class="women">-->
<!--                                                    <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>-->
<!--                                                    <span class="size">XL / XXL / S </span>-->
<!--                                                    <p ><del>$100.00</del><em class="item_price">$70.00</em></p>-->
<!--                                                    <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="clearfix"></div>-->
<!--                                    </div>-->
<!--                                    <div class="product-tab prod2">-->
<!--                                        <div class="col-md-4 product-tab-grid simpleCart_shelfItem">-->
<!--                                            <div class="grid-arr">-->
<!--                                                <div  class="grid-arrival">-->
<!--                                                    <figure>-->
<!--                                                        <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">-->
<!--                                                            <div class="grid-img">-->
<!--                                                                <img  src="/images/i8.jpg" class="img-responsive" alt="">-->
<!--                                                            </div>-->
<!--                                                            <div class="grid-img">-->
<!--                                                                <img  src="/images/i7.jpg" class="img-responsive"  alt="">-->
<!--                                                            </div>-->
<!--                                                        </a>-->
<!--                                                    </figure>-->
<!--                                                </div>-->
<!--                                                <div class="block">-->
<!--                                                    <div class="starbox small ghosting"> </div>-->
<!--                                                </div>-->
<!--                                                <div class="women">-->
<!--                                                    <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>-->
<!--                                                    <span class="size">XL / XXL / S </span>-->
<!--                                                    <p ><del>$100.00</del><em class="item_price">$70.00</em></p>-->
<!--                                                    <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="col-md-4 product-tab-grid simpleCart_shelfItem">-->
<!--                                            <div class="grid-arr">-->
<!--                                                <div  class="grid-arrival">-->
<!--                                                    <figure>-->
<!--                                                        <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">-->
<!--                                                            <div class="grid-img">-->
<!--                                                                <img  src="/images/i14.jpg" class="img-responsive" alt="">-->
<!--                                                            </div>-->
<!--                                                            <div class="grid-img">-->
<!--                                                                <img  src="/images/i13.jpg" class="img-responsive"  alt="">-->
<!--                                                            </div>-->
<!--                                                        </a>-->
<!--                                                    </figure>-->
<!--                                                </div>-->
<!--                                                <div class="block">-->
<!--                                                    <div class="starbox small ghosting"> </div>-->
<!--                                                </div>-->
<!--                                                <div class="women">-->
<!--                                                    <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>-->
<!--                                                    <span class="size">XL / XXL / S </span>-->
<!--                                                    <p ><del>$100.00</del><em class="item_price">$70.00</em></p>-->
<!--                                                    <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="col-md-4 product-tab-grid simpleCart_shelfItem">-->
<!--                                            <div class="grid-arr">-->
<!--                                                <div  class="grid-arrival">-->
<!--                                                    <figure>-->
<!--                                                        <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">-->
<!--                                                            <div class="grid-img">-->
<!--                                                                <img  src="/images/i2.jpg" class="img-responsive" alt="">-->
<!--                                                            </div>-->
<!--                                                            <div class="grid-img">-->
<!--                                                                <img  src="/images/i1.jpg" class="img-responsive"  alt="">-->
<!--                                                            </div>-->
<!--                                                        </a>-->
<!--                                                    </figure>-->
<!--                                                </div>-->
<!--                                                <div class="block">-->
<!--                                                    <div class="starbox small ghosting"> </div>-->
<!--                                                </div>-->
<!--                                                <div class="women">-->
<!--                                                    <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>-->
<!--                                                    <span class="size">XL / XXL / S </span>-->
<!--                                                    <p ><del>$100.00</del><em class="item_price">$70.00</em></p>-->
<!--                                                    <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="clearfix"></div>-->
<!--                                    </div>-->
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
                                    <div class="product-tab1">
                                        <div class="col-md-4 product-tab1-grid">
                                            <div class="grid-arr">
                                                <div  class="grid-arrival">
                                                    <figure>
                                                        <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
                                                            <div class="grid-img">
                                                                <img  src="/images/p6.jpg" class="img-responsive" alt="">
                                                            </div>
                                                            <div class="grid-img">
                                                                <img  src="/images/p5.jpg" class="img-responsive"  alt="">
                                                            </div>
                                                        </a>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 product-tab1-grid1 simpleCart_shelfItem">
                                            <div class="block">
                                                <div class="starbox small ghosting"> </div>
                                            </div>
                                            <div class="women">
                                                <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
                                                <span class="size">XL / XXL / S </span>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Atqui iste locus est, Piso, tibi etiam atque etiam confirmandus, inquam; Refert tamen, quo modo. Quod autem meum munus dicis non equidem recuso, sed te adiungo socium. </p>
                                                <p ><del>$100.00</del><em class="item_price">$70.00</em></p>
                                                <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="product-tab1 prod3">
                                        <div class="col-md-4 product-tab1-grid">
                                            <div class="grid-arr">
                                                <div  class="grid-arrival">
                                                    <figure>
                                                        <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
                                                            <div class="grid-img">
                                                                <img  src="/images/i2.jpg" class="img-responsive" alt="">
                                                            </div>
                                                            <div class="grid-img">
                                                                <img  src="/images/i1.jpg" class="img-responsive"  alt="">
                                                            </div>
                                                        </a>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 product-tab1-grid1 simpleCart_shelfItem">
                                            <div class="block">
                                                <div class="starbox small ghosting"> </div>
                                            </div>
                                            <div class="women">
                                                <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
                                                <span class="size">XL / XXL / S </span>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Atqui iste locus est, Piso, tibi etiam atque etiam confirmandus, inquam; Refert tamen, quo modo. Quod autem meum munus dicis non equidem recuso, sed te adiungo socium. </p>
                                                <p ><del>$100.00</del><em class="item_price">$70.00</em></p>
                                                <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="product-tab1">
                                        <div class="col-md-4 product-tab1-grid">
                                            <div class="grid-arr">
                                                <div  class="grid-arrival">
                                                    <figure>
                                                        <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
                                                            <div class="grid-img">
                                                                <img  src="/images/i4.jpg" class="img-responsive" alt="">
                                                            </div>
                                                            <div class="grid-img">
                                                                <img  src="/images/i3.jpg" class="img-responsive"  alt="">
                                                            </div>
                                                        </a>
                                                    </figure>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-8 product-tab1-grid1 simpleCart_shelfItem">
                                            <div class="block">
                                                <div class="starbox small ghosting"> </div>
                                            </div>
                                            <div class="women">
                                                <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
                                                <span class="size">XL / XXL / S </span>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Atqui iste locus est, Piso, tibi etiam atque etiam confirmandus, inquam; Refert tamen, quo modo. Quod autem meum munus dicis non equidem recuso, sed te adiungo socium. </p>
                                                <p ><del>$100.00</del><em class="item_price">$70.00</em></p>
                                                <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="product-tab1 prod3">
                                        <div class="col-md-4 product-tab1-grid">
                                            <div class="grid-arr">
                                                <div  class="grid-arrival">
                                                    <figure>
                                                        <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
                                                            <div class="grid-img">
                                                                <img  src="/images/i6.jpg" class="img-responsive" alt="">
                                                            </div>
                                                            <div class="grid-img">
                                                                <img  src="/images/i5.jpg" class="img-responsive"  alt="">
                                                            </div>
                                                        </a>
                                                    </figure>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-8 product-tab1-grid1 simpleCart_shelfItem">
                                            <div class="block">
                                                <div class="starbox small ghosting"> </div>
                                            </div>
                                            <div class="women">
                                                <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
                                                <span class="size">XL / XXL / S </span>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Atqui iste locus est, Piso, tibi etiam atque etiam confirmandus, inquam; Refert tamen, quo modo. Quod autem meum munus dicis non equidem recuso, sed te adiungo socium. </p>
                                                <p ><del>$100.00</del><em class="item_price">$70.00</em></p>
                                                <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="product-tab1">
                                        <div class="col-md-4 product-tab1-grid">
                                            <div class="grid-arr">
                                                <div  class="grid-arrival">
                                                    <figure>
                                                        <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
                                                            <div class="grid-img">
                                                                <img  src="/images/i8.jpg" class="img-responsive" alt="">
                                                            </div>
                                                            <div class="grid-img">
                                                                <img  src="/images/i7.jpg" class="img-responsive"  alt="">
                                                            </div>
                                                        </a>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 product-tab1-grid1 simpleCart_shelfItem">
                                            <div class="block">
                                                <div class="starbox small ghosting"> </div>
                                            </div>
                                            <div class="women">
                                                <h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
                                                <span class="size">XL / XXL / S </span>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Atqui iste locus est, Piso, tibi etiam atque etiam confirmandus, inquam; Refert tamen, quo modo. Quod autem meum munus dicis non equidem recuso, sed te adiungo socium. </p>
                                                <p ><del>$100.00</del><em class="item_price">$70.00</em></p>
                                                <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                </div>
                            </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"> </div>
<!--content-->