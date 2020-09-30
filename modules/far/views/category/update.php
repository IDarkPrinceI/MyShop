<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\far\models\Category */

$this->title = 'Редактировать: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
            </div>
            <div class="box-body">
                <div class="category-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>
