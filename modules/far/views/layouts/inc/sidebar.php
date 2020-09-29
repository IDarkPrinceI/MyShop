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
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active">
                <a href="<?= Url::to(['home/index'])?>"><i class="fa fa-building-o"></i>Статистика магазина</a></li>
<!--            <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>-->
            <li class="treeview">
                <a href=""><i class="fa fa-opencart"></i>Товары
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li class="my123"><a href="<?= Url::to(['product/index'])?>">Просмотр товаров</a></li>
                    <li class="my321"><a href="<?= Url::to(['product/create'])?>">Добавить товар</a></li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>