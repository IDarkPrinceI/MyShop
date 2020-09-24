<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <!--    <p>-->
                <!--        --><?//= Html::a('Добавить заказ', ['create'], ['class' => 'btn btn-success']) ?>
                <!--    </p>-->
            </div>
            <div class="box-body">
                <div class="order-index">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'status',
                            'qty',
                            'sum',
                            'name',
                            'email',
                            'phone',
                            'address',
                            'note:ntext',
                            [
                                'attribute' => 'created_at',
                                'format' => ['date', 'php:d-M-Y | H:i']
                            ],

                            [
                                'attribute' => 'updated_at',
                                'format' => ['date', 'php:d-M-Y | H:i']
                            ],
                            //'user_id',
                            ['class' => 'yii\grid\ActionColumn',
                                'header' => 'Действия'
                            ],
//
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>


