<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\far\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

            <div class="product-form">

    <?php $form = ActiveForm::begin([
            'fieldConfig' => [
                    'template' => '
                    <div class="col-md-6">
                        <p>{label}</p>{input} 
                        <div>{error}</div>
                    </div> 
                    ',
                ]
    ]); ?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <div class="col-md-6 form-group field-product-category_id has-success">

            <label class="control-label" for="product-category_id"><p>Категория</p></label>
            <select id="product-category_id" class="form-control" name="Product[category_id]" aria-invalid="false">

                <?= \app\components\DropDownWidget::widget([
                    'tpl' => 'selectForProduct',
                    'model' => $model,
                    'cache_time' => 0,
                ])?>

            </select>

        </div>


    <?= $form->field($model, 'content')->textarea(['rows' => 4]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'old_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brand_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_sale')->checkbox() ?>

    <?= $form->field($model, 'is_hit')->checkbox() ?>

    <?= $form->field($model, 'is_new')->checkbox() ?>



    <div class="form-group">

    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
