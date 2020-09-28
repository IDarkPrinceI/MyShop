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
//            'name',
            [
                'attribute' => 'name',
                'format' => 'html',
                'value' => function($data) {
                    return '<a href="' .\yii\helpers\Url::to(['/product/view' , 'id' => $data->id]) . '">' . $data->name . '</a>';
                }
            ],
            [
                'attribute' => 'category_id',
                'format' => 'html',
                'value' => function($data) {
                    return '<a href="' . \yii\helpers\Url::to(['/category/view', 'category_id' => $data->category->id]) . '">' . $data->category->name . '</a>';
                }
            ],
            'price',
            [
                'attribute' => 'old_price',
                'value' => function($data) {
                    if( empty($data->old_price) ) {
                        return '';
                    } else {
                        return $data->old_price;
                    }
                }
            ],
            [
                'attribute' => 'brand_id',
                'value' => function($data) {
                    return $data->brand->name;
                }
            ],
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
            ['class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
            ],
        ],
    ]); ?>
            </div>
        </div>
    </div>
</div>
