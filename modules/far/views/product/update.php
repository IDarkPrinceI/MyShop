<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\far\models\Product */
/* @var $img app\modules\far\models\UploadForm */

$this->title = 'Редактирование';
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
            </div>
            <div class="box-body">
                <div class="product-update">

    <?= $this->render('_form', [
        'model' => $model,
        'img' => $img
    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
