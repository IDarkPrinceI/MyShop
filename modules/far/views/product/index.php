<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\far\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="product-index">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <p>
        <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'category_id',
            'name',
            'price',
            'old_price',
            [
                'attribute' => 'is_sale',
                'format' => 'html',
                'value' => function($data) {
                    switch ($data->is_sale) {
                        case 0: return '<span></span>';
                        case 1: return '<span class="text-yellow">Распродажа</span>';
                        default: return 'Ошибка';
                    }
                },
            ],
            [
                'attribute' => 'is_hit',
                'format' => 'html',
                'value' => function($data) {
                    switch ($data->is_hit) {
                        case 0: return '<span></span>';
                        case 1: return '<span class="text-red">Хит</span>';
                        default: return 'Ошибка';
                    }
                }
            ],
            [
                'attribute' => 'is_new',
                'format' => 'html',
                'value' => function($data) {
                    switch ($data->is_new) {
                        case 0: return '<span></span>';
                        case 1: return '<span class="text-blue">Новинка</span>';
                        default: return 'Ошибка';
                    }
                }
            ],
            'brand_id',

            ['class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
            ],
        ],
    ]); ?>
            </div>
        </div>
    </div>
</div>
