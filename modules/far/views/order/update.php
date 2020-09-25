<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\far\models\Order */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Редактирование заказа №', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $model->id;
?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <div class="order-update">

                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>
