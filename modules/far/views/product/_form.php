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

<!--    --><?//= $form->field($model, 'category_id')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'category_id')->dropDownList(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

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
