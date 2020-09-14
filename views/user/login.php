<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

?>



<!--login-->
<div class="login">
    <div class="main-agileits">
        <div class="form-w3agile">
            <h3>Вход на сайт</h3>
            <?php $form = ActiveForm::begin() ?>
            <?= $form->field($model, 'username',
                ['template' => "<div class='form-group has-feedback'> {input} 
<span class=\"glyphicon glyphicon-king form-control-feedback\"></span>
<div>{error}</div></div>",])->textInput(['placeholder' => 'Логин']) ?>
            <?= $form->field($model, 'password',
                ['template' => "<div class='form-group has-feedback'> {input} 
<span class=\"glyphicon glyphicon-equalizer form-control-feedback\"></span>
<div>{error}</div></div>",])->passwordInput(['placeholder' => 'Пароль']) ?>
            <div class="form-group">
                <div>
                    <?= Html::submitButton('Вход', ['class' => 'btn btn-primary btn-block btn-flat']) ?>
                </div>
            </div>
            <?php ActiveForm::end() ?>
        </div>
            <div class="forg-left">
                <div class="checkbox2">
                    <?= $form->field($model, 'rememberMe')->checkbox([
                        'template' => "{label} {input}"
                    ]) ?>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="forg-right">
                <a href="#">Забыли пароль?</a>
                <span>/</span>
                <a href="<?= Url::to(['user/signup'])?>">Регистрация</a>
            </div>
    </div>
</div>
<!--login-->