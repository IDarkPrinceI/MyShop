<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\far\models\Brand */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Бренды', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <div class="brand-view">

        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить это бренд?',
                'method' => 'post',
            ],
        ]) ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            [
                'attribute' => 'content',
                'value' => $model['content'] ?? '',
            ],
            [
                'attribute' => 'keywords',
                'value' => $model['keywords'] ?? '',
            ],
            [
                'attribute' => 'description',
                'value' => $model['description'] ?? '',
            ],
            'image',
        ],
    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>
