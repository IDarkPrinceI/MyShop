<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\far\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">



        <?= Html::a('Добавить категорию', ['create'], ['class' => 'btn btn-success']) ?>

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
                    return '<a href="' . \yii\helpers\Url::to(['/category/view', 'category_id' => $data->id]) . '">' . $data->name;
                }
            ],
//            'parent_id',
            [
                'attribute' => 'parent_id',
                'value' => function($data) {
                    return $data->category->name ? $data->category->name : '';
                }
            ],
            'description',
            'keywords',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


            </div>
        </div>
    </div>
</div>
