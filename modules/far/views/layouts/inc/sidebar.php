<?php


use yii\helpers\Url; ?>




<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- search form (Optional) -->
<!--        <form action="--><?//= Url::to(['/product/search'])?><!--" method="get" class="sidebar-form">-->
<!--            <div class="input-group">-->
<!--                <input autocomplete="off" type="text" name="search" class="form-control" placeholder="Поиск...">-->
<!--                <span class="input-group-btn">-->
<!--              <button type="submit" class="btn btn-flat"><i class="fa fa-search"></i>-->
<!--              </button>-->
<!--            </span>-->
<!--            </div>-->
<!--        </form>-->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"></li>
            <!-- Optionally, you can add icons to the links -->
            <li id="mainPage">
                <a  href="<?= Url::to(['home/index'])?>"><i class="fa fa-building-o"></i><span>Статистика магазина</span></a></li>
<!--            <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>-->
            <li class="treeview">
                <a href=""><i class="fa fa-archive"></i><span>Заказы</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= Url::to(['order/index'])?>">Список заказов</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href=""><i class="fa fa-sliders"></i><span>Категории</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= Url::to(['category/index'])?>">Список категорий</a></li>
                    <li><a href="<?= Url::to(['category/create'])?>">Добавить категорию</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href=""><i class="fa fa-opencart"></i><span>Товары</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= Url::to(['product/index'])?>">Список товаров</a></li>
                    <li><a href="<?= Url::to(['product/create'])?>">Добавить товар</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href=""><i class="fa fa-bars"></i><span>Бренды</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= Url::to(['brand/index'])?>">Список брендов</a></li>
                    <li><a href="<?= Url::to(['brand/create'])?>">Добавить бренд</a></li>
                </ul>
            </li>



        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>