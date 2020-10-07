
<?php

use yii\helpers\Url;

$this->title = 'Статистика магазина';
$this->params['breadcrumbs'][] = $this->title;
?>

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?= $newOrders?></h3>
                        <p>Новых заказов</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?= Url::to(['order/index'])?>" class="small-box-footer">Просмотреть <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?= $categories ?></h3>
                        <p>Категорий</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-bookmark"></i>
                    </div>
                    <a href="<?= Url::to(['category/index'])?>" class="small-box-footer">Просмотреть <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?= $products ?></h3>
                        <p>Товаров</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cube"></i>
                    </div>
                    <a href="<?= Url::to(['product/index'])?>" class="small-box-footer">Просмотреть <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3><?= $brands ?></h3>
                        <p>Брендов</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-gg"></i>
                    </div>
                    <a href="<?= Url::to(['brand/index'])?>" class="small-box-footer">Просмотреть <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?= $uniqueUsers?></h3>
                        <p>Уникальных посетителей</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="<?= Url::to(['statistic/index'])?>" class="small-box-footer">Просмотреть <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
<!--            <div class="col-lg-3 col-xs-6">-->
<!--                <div class="small-box bg-yellow">-->
<!--                    <div class="inner">-->
<!--                        <h3>44</h3>-->
<!---->
<!--                        <p>User Registrations</p>-->
<!--                    </div>-->
<!--                    <div class="icon">-->
<!--                        <i class="ion ion-person-add"></i>-->
<!--                    </div>-->
<!--                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
<!--                </div>-->
<!--            </div>-->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->


