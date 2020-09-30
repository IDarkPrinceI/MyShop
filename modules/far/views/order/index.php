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
                            [
                                 'attribute' => 'status',
                                 'value' => function($data) {
                                        switch ($data->status) {
                                            case 0: return '<span class="text-red">Новый</span>';
                                            case 1: return '<span class="text-green">Завершен</span>';
                                            default: return 'Ошибка';
                                        }
                                 },
                                'format' => 'html',
                            ],
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
                            ['class' => 'yii\grid\ActionColumn',
                                'header' => 'Действия'
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>


