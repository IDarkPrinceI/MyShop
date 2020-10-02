<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\far\models\Brand */

$this->title = 'Редактировать: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Бренды', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
            </div>
            <div class="box-body">
                <div class="brand-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>
