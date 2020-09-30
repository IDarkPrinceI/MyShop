<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\far\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin([
            'fieldConfig' => [
                    'template' => "
                    <div class='col-md-6'>
                    <p>{label}</p> \n {input} \n
                    <div>{error}</div>
                    </div>
                    "
            ]
    ]); ?>
<!--    --><?php //$status = [
//            0 => 'В работе',
//            1 => 'Завершен',
//    ];
//    ?>

    <?= $form->field($model, 'status')->dropDownList(['В работе', 'Завершен']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'note')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'sum')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'qty')->textInput(['readonly' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
