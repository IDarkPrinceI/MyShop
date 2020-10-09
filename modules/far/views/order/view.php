<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\far\models\Order */

$this->title = 'Заказ №' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="row">
    <div class="col-md-12">
        <p>
            <?= Html::a('Редактировать',
                ['update', 'id' => $model->id],
                ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Удалить',
                ['delete', 'id' => $model->id],
                ['class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы действительно хотите удалить этот заказ?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
        <div class="box">
            <div class="order-view">
                <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => $model->status ? '<span class="text-green">Завершено</span>' : '<span class="text-red">Новый</span>'
            ],
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:d-M-Y | H:i']
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'php:d-M-Y | H:i']
            ],
            'qty',
            'name',
            'email:email',
            'phone',
            'address',
            'note:ntext',
        ],
    ]) ?>

                <?php $orderProducts = $model->products; ?>

                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Наименование</th>
                        <th>Количество, шт</th>
                        <th>Цена, руб</th>
                        <th>Сумма, руб</th>
                    </tr>
                    <?php foreach ($orderProducts as $product): ?>
                        <tr>
                            <td><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product['product_id']])?>"><?= $product->name ?></td>
                            <td><?= $product->qty; ?></td>
                            <td><?= $product->price; ?></td>
                            <td><?= $product->sum; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <th colspan="3" class="text-right">Итого:</th>
                        <th><?= $model->sum; ?> руб</th>
                    </tr>
                </table>

                </div>
            </div>
        </div>
    </div>
</div>
