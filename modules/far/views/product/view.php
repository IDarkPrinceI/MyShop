<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\far\models\Product */

$this->title = '№' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>


        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить этот товар?',
                'method' => 'post',
            ],
        ]) ?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <div class="product-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'category_id',
                'format' => 'html',
                'value' => function($data) {
                    return '<a href="' . \yii\helpers\Url::to(['/category/view', 'category_id' => $data->category->id]) . '">' . $data->category->name . '</a>';
                }
            ],
            'name',
            'content:raw',
            'price',
            [
                'attribute' => 'old_price',
                'value' => $model->old_price ? $model->old_price : '',
            ],
            [
                'attribute' => 'brand_id',
                'value' => $model->brand->name
            ],
//            'description',
//            'keywords',
            [
                'attribute' => 'img',
                'value' => "/uploads/product/{$model->img}",
                'format' => ['image', ['height' => '125']],
            ],
            [
                'attribute' => 'is_sale',
                'format' => 'html',
                'value' => $model->is_sale ? '<span class="text-yellow">Распродажа</span>' : '',
            ],
            [
                'attribute' => 'is_hit',
                'format' => 'html',
                'value' => $model->is_hit ? '<span class="text-red">Хит</span>' : '<span></span>',
            ],
            [
                'attribute' => 'is_new',
                'format' => 'html',
                'value' => $model->is_new ? '<span class="text-blue">Новинка</span>' : '<span></span>',
            ],
        ],
    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>
