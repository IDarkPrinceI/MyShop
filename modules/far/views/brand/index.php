<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\far\models\BrandSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Бренды';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-index">

        <?= Html::a('Добавить бренд', ['create'], ['class' => 'btn btn-success']) ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'name',
                'format' => 'html',
                'value' => function($data) {
                   return '<a href="' . \yii\helpers\Url::to(['brand/view', 'id' => $data->id]) . '">' . $data->name . '</a>';
                }
            ],
            'content',
            'keywords',
            'description',
            //'image',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

                </div>
            </div>
        </div>
    </div>
</div>
