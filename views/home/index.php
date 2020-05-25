<div class="content">
    <!--banner-bottom-->
<!--    <div class="ban-bottom-w3l">-->
<!--        <div class="container">-->
<!--            <div class="col-md-6 ban-bottom">-->
<!--                <div class="ban-top">-->
<!--                    <img src="images/p1.jpg" class="img-responsive" alt=""/>-->
<!--                    <div class="ban-text">-->
<!--                        <h4>Men’s Clothing</h4>-->
<!--                    </div>-->
<!--                    <div class="ban-text2 hvr-sweep-to-top">-->
<!--                        <h4>50% <span>Off/-</span></h4>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-6 ban-bottom3">-->
<!--                <div class="ban-top">-->
<!--                    <img src="images/p2.jpg" class="img-responsive" alt=""/>-->
<!--                    <div class="ban-text1">-->
<!--                        <h4>Women's Clothing</h4>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="ban-img">-->
<!--                    <div class=" ban-bottom1">-->
<!--                        <div class="ban-top">-->
<!--                            <img src="images/p3.jpg" class="img-responsive" alt=""/>-->
<!--                            <div class="ban-text1">-->
<!--                                <h4>T - Shirt</h4>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="ban-bottom2">-->
<!--                        <div class="ban-top">-->
<!--                            <img src="images/p4.jpg" class="img-responsive" alt=""/>-->
<!--                            <div class="ban-text1">-->
<!--                                <h4>Hand Bag</h4>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="clearfix"></div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="clearfix"></div>-->
<!--        </div>-->
<!--    </div>-->
    <!--banner-bottom-->
    <!--new-arrivals-->
<!--    --><?//= debug($productNew) ?>
    <?php if(!empty($productNew)) :?>
    <div class="new-arrivals-w3agile">
        <div class="container">
            <h2 class="tittle">Новые поступления</h2>
            <?php foreach ($productNew as $new): ?>
            <div class="arrivals-grids">
                <div class="col-md-3 arrival-grid simpleCart_shelfItem">
                    <div class="grid-arr">
                        <div  class="grid-arrival">
                            <figure>
                                <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
                                    <div class="grid-img">
                                        <img  src="<?= \yii\helpers\Url::to(["@web/product_img/{$new->img}", ['alt' => $new->name, 'class'=>'img-responsive']]) ?>" class="img-responsive" alt="">
                                    </div>
                                    <div class="grid-img">
<!--                                        <img  src="images/p5.jpg" class="img-responsive"  alt="">-->
                                    </div>
                                </a>
                            </figure>
                        </div>
                        <div class="ribben">
                            <p>NEW</p>
                        </div>
                        <div class="block">
                            <div class="starbox small ghosting"> </div>
                        </div>
                        <div class="women">
                            <h6><a href="single.html"><?=$new->name ?></a></h6>
                            <span class="size">XL / XXL / S </span>
                            <p ><em class="price"><?= $new->price ?>
                                    <em class="rub"> Р</em>
                                </em>
                            </p>
                            <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--new-arrivals-->
    <!--accessories-->
    <div class="accessories-w3l">
        <div class="container">
            <h3 class="tittle">20% Discount on</h3>
            <span>TRENDING DESIGNS</span>
            <div class="button">
                <a href="#" class="button1"> Shop Now</a>
                <a href="#" class="button1"> Quick View</a>
            </div>
        </div>
    </div>
    <!--accessories-->
    <!--Products-->
    <div class="product-agile">
        <div class="container">
            <h3 class="tittle1"> New Products</h3>
            <div class="slider">
                <div class="callbacks_container">
                    <ul class="rslides" id="slider">
                        <li>
                            <div class="caption">
                                <div class="col-md-3 cap-left simpleCart_shelfItem">
                                    <div class="grid-arr">
                                        <div  class="grid-arrival">
                                            <figure>
                                                <a href="single.html">
                                                    <div class="grid-img">
                                                        <img  src="images/p14.jpg" class="img-responsive" alt="">
                                                    </div>
                                                    <div class="grid-img">
                                                        <img  src="images/p13.jpg" class="img-responsive"  alt="">
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
                                <div class="col-md-3 cap-left simpleCart_shelfItem">
                                    <div class="grid-arr">
                                        <div  class="grid-arrival">
                                            <figure>
                                                <a href="single.html">
                                                    <div class="grid-img">
                                                        <img  src="images/p15.jpg" class="img-responsive" alt="">
                                                    </div>
                                                    <div class="grid-img">
                                                        <img  src="images/p16.jpg" class="img-responsive"  alt="">
                                                    </div>
                                                </a>
                                            </figure>
                                        </div>
                                        <div class="ribben">
                                            <p>NEW</p>
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
                                <div class="col-md-3 cap-left simpleCart_shelfItem">
                                    <div class="grid-arr">
                                        <div  class="grid-arrival">
                                            <figure>
                                                <a href="single.html">
                                                    <div class="grid-img">
                                                        <img  src="images/p18.jpg" class="img-responsive" alt="">
                                                    </div>
                                                    <div class="grid-img">
                                                        <img  src="images/p17.jpg" class="img-responsive"  alt="">
                                                    </div>
                                                </a>
                                            </figure>
                                        </div>
                                        <div class="ribben1">
                                            <p>SALE</p>
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
                                <div class="col-md-3 cap-left simpleCart_shelfItem">
                                    <div class="grid-arr">
                                        <div  class="grid-arrival">
                                            <figure>
                                                <a href="single.html">
                                                    <div class="grid-img">
                                                        <img  src="images/p20.jpg" class="img-responsive" alt="">
                                                    </div>
                                                    <div class="grid-img">
                                                        <img  src="images/p19.jpg" class="img-responsive"  alt="">
                                                    </div>
                                                </a>
                                            </figure>
                                        </div>
                                        <div class="ribben">
                                            <p>-20%</p>
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
                        </li>
                        <li>
                            <div class="caption">
                                <div class="col-md-3 cap-left simpleCart_shelfItem">
                                    <div class="grid-arr">
                                        <div  class="grid-arrival">
                                            <figure>
                                                <a href="single.html">
                                                    <div class="grid-img">
                                                        <img  src="images/p21.jpg" class="img-responsive" alt="">
                                                    </div>
                                                    <div class="grid-img">
                                                        <img  src="images/p22.jpg" class="img-responsive"  alt="">
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
                                <div class="col-md-3 cap-left simpleCart_shelfItem">
                                    <div class="grid-arr">
                                        <div  class="grid-arrival">
                                            <figure>
                                                <a href="single.html">
                                                    <div class="grid-img">
                                                        <img  src="images/p24.jpg" class="img-responsive" alt="">
                                                    </div>
                                                    <div class="grid-img">
                                                        <img  src="images/p23.jpg" class="img-responsive"  alt="">
                                                    </div>
                                                </a>
                                            </figure>
                                        </div>
                                        <div class="ribben">
                                            <p>NEW</p>
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
                                <div class="col-md-3 cap-left simpleCart_shelfItem">
                                    <div class="grid-arr">
                                        <div  class="grid-arrival">
                                            <figure>
                                                <a href="single.html">
                                                    <div class="grid-img">
                                                        <img  src="images/p26.jpg" class="img-responsive" alt="">
                                                    </div>
                                                    <div class="grid-img">
                                                        <img  src="images/p25.jpg" class="img-responsive"  alt="">
                                                    </div>
                                                </a>
                                            </figure>
                                        </div>
                                        <div class="ribben">
                                            <p>-75%</p>
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
                                <div class="col-md-3 cap-left simpleCart_shelfItem">
                                    <div class="grid-arr">
                                        <div  class="grid-arrival">
                                            <figure>
                                                <a href="single.html">
                                                    <div class="grid-img">
                                                        <img  src="images/p10.jpg" class="img-responsive" alt="">
                                                    </div>
                                                    <div class="grid-img">
                                                        <img  src="images/p9.jpg" class="img-responsive"  alt="">
                                                    </div>
                                                </a>
                                            </figure>
                                        </div>
                                        <div class="ribben">
                                            <p>NEW</p>
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
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Products-->
    <div class="latest-w3">
        <div class="container">
            <h3 class="tittle1">Latest Fashion Trends</h3>
            <div class="latest-grids">
                <div class="col-md-4 latest-grid">
                    <div class="latest-top">
                        <img  src="images/l1.jpg" class="img-responsive"  alt="">
                        <div class="latest-text">
                            <h4>Men</h4>
                        </div>
                        <div class="latest-text2 hvr-sweep-to-top">
                            <h4>-50%</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 latest-grid">
                    <div class="latest-top">
                        <img  src="images/l2.jpg" class="img-responsive"  alt="">
                        <div class="latest-text">
                            <h4>Shoes</h4>
                        </div>
                        <div class="latest-text2 hvr-sweep-to-top">
                            <h4>-20%</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 latest-grid">
                    <div class="latest-top">
                        <img  src="images/l3.jpg" class="img-responsive"  alt="">
                        <div class="latest-text">
                            <h4>Women</h4>
                        </div>
                        <div class="latest-text2 hvr-sweep-to-top">
                            <h4>-50%</h4>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="latest-grids">
                <div class="col-md-4 latest-grid">
                    <div class="latest-top">
                        <img  src="images/l4.jpg" class="img-responsive"  alt="">
                        <div class="latest-text">
                            <h4>Watch</h4>
                        </div>
                        <div class="latest-text2 hvr-sweep-to-top">
                            <h4>-45%</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 latest-grid">
                    <div class="latest-top">
                        <img  src="images/l5.jpg" class="img-responsive"  alt="">
                        <div class="latest-text">
                            <h4>Bag</h4>
                        </div>
                        <div class="latest-text2 hvr-sweep-to-top">
                            <h4>-10%</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 latest-grid">
                    <div class="latest-top">
                        <img  src="images/l6.jpg" class="img-responsive"  alt="">
                        <div class="latest-text">
                            <h4>Cameras</h4>
                        </div>
                        <div class="latest-text2 hvr-sweep-to-top">
                            <h4>-30%</h4>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="new-arrivals-w3agile">
        <div class="container">
            <h3 class="tittle1">Best Sellers</h3>
            <div class="arrivals-grids">
                <div class="col-md-3 arrival-grid simpleCart_shelfItem">
                    <div class="grid-arr">
                        <div  class="grid-arrival">
                            <figure>
                                <a href="single.html">
                                    <div class="grid-img">
                                        <img  src="images/p28.jpg" class="img-responsive" alt="">
                                    </div>
                                    <div class="grid-img">
                                        <img  src="images/p27.jpg" class="img-responsive"  alt="">
                                    </div>
                                </a>
                            </figure>
                        </div>
                        <div class="ribben">
                            <p>NEW</p>
                        </div>
                        <div class="ribben1">
                            <p>SALE</p>
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
                <div class="col-md-3 arrival-grid simpleCart_shelfItem">
                    <div class="grid-arr">
                        <div  class="grid-arrival">
                            <figure>
                                <a href="single.html">
                                    <div class="grid-img">
                                        <img  src="images/p30.jpg" class="img-responsive" alt="">
                                    </div>
                                    <div class="grid-img">
                                        <img  src="images/p29.jpg" class="img-responsive"  alt="">
                                    </div>
                                </a>
                            </figure>
                        </div>
                        <div class="ribben2">
                            <p>OUT OF STOCK</p>
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
                <div class="col-md-3 arrival-grid simpleCart_shelfItem">
                    <div class="grid-arr">
                        <div  class="grid-arrival">
                            <figure>
                                <a href="single.html">
                                    <div class="grid-img">
                                        <img  src="images/s2.jpg" class="img-responsive" alt="">
                                    </div>
                                    <div class="grid-img">
                                        <img  src="images/s1.jpg" class="img-responsive"  alt="">
                                    </div>
                                </a>
                            </figure>
                        </div>
                        <div class="ribben1">
                            <p>SALE</p>
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
                <div class="col-md-3 arrival-grid simpleCart_shelfItem">
                    <div class="grid-arr">
                        <div  class="grid-arrival">
                            <figure>
                                <a href="single.html">
                                    <div class="grid-img">
                                        <img  src="images/s4.jpg" class="img-responsive" alt="">
                                    </div>
                                    <div class="grid-img">
                                        <img  src="images/s3.jpg" class="img-responsive"  alt="">
                                    </div>
                                </a>
                            </figure>
                        </div>
                        <div class="ribben">
                            <p>NEW</p>
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
        </div>
    </div>
    <!--new-arrivals-->
</div>