<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\far\models\Brand */

$this->title = 'Добавить бренд';
$this->params['breadcrumbs'][] = ['label' => 'Бренд', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">

            </div>
            <div class="box-body">
                <div class="brand-create">

    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>
