<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

mihaildev\elfinder\Assets::noConflict($this);

/* @var $this yii\web\View */
/* @var $model app\modules\far\models\Product */
/* @var $img app\modules\far\models\UploadForm */
/* @var $form yii\widgets\ActiveForm */

?>

            <div class="product-form">

    <?php $form = ActiveForm::begin(['options' => [],
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

<!--    --><?//= $form->field($model, 'content')->textarea(['rows' => 4]) ?>

<!--    --><?php //echo $form->field($model, 'content')->widget(CKEditor::class,[
//        'editorOptions' => [
//            'preset' => 'standard', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
//            'inline' => false, //по умолчанию false
//        ],
//    ]);?>
    <?php
    echo $form->field($model, 'content')->widget(CKEditor::class, [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',['preset' => 'standard'/* Some CKEditor Options */]),
    ]);
    ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'old_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'img')->textInput(['maxlength' => true, 'value' => 'no-image.png']) ?>
    <?= $form->field($img, 'img')->fileInput() ?>

    <?= $form->field($model, 'brand_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\modules\far\models\Brand::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'is_sale')->checkbox() ?>

    <?= $form->field($model, 'is_hit')->checkbox() ?>

    <?= $form->field($model, 'is_new')->checkbox() ?>



    <div class="form-group">

    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
