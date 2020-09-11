<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<div class="container">
    <?php $form = ActiveForm::begin() ?>
    <?= $form->field($model, 'username') ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <div class="form-group">
        <div>
            <?= Html::submitButton('Регистрация', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end() ?>
</div>
