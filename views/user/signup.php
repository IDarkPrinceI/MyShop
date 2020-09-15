<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<!--<div class="container">-->
<!--    --><?php //$form = ActiveForm::begin() ?>
<!--    --><?//= $form->field($model, 'username') ?>
<!--    --><?//= $form->field($model, 'password')->passwordInput() ?>
<!--    <div class="form-group">-->
<!--        <div>-->
<!--            --><?//= Html::submitButton('Регистрация', ['class' => 'btn btn-success']) ?>
<!--        </div>-->
<!--    </div>-->
<!--    --><?php //ActiveForm::end() ?>
<!--</div>-->
<div class="login">
    <div class="main-agileits">
        <div class="form-w3agile">
            <h3>Регистрация на сайте</h3>
            <?php $form = ActiveForm::begin() ?>
            <?= $form->field($model, 'username',
                ['template' => "<div class='form-group has-feedback'> {input} 
<span class=\"glyphicon glyphicon-king form-control-feedback\"></span>
<div>{error}</div></div>",])->textInput(['placeholder' => 'Логин', 'autocomplete' => 'off']) ?>
            <?= $form->field($model, 'password',
                ['template' => "<div class='form-group has-feedback'> {input} 
<span class=\"glyphicon glyphicon-equalizer form-control-feedback\"></span>
<div>{error}</div></div>",])->passwordInput(['placeholder' => 'Пароль','autocomplete' => 'off']) ?>
            <div class="form-group">
                <div>
                    <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary btn-block btn-flat']) ?>
                </div>
            </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>
