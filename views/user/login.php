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
<!--            <form action="#" method="post">-->
<!--                <div class="key">-->
<!--                    <i class="fa fa-envelope" aria-hidden="true"></i>-->
<!--                    <input type="text" value="E-mail" name="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">-->
<!--                    <div class="clearfix"></div>-->
<!--                </div>-->
<!--                <div class="key">-->
<!--                    <i class="fa fa-lock" aria-hidden="true"></i>-->
<!--                    <input type="password" value="Password" name="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">-->
<!--                    <div class="clearfix"></div>-->
<!--                </div>-->
<!--                <input type="submit" value="Вход">-->
<!--            </form>-->
            <div class="form-group">
                <div>
                    <?= Html::submitButton('Вход', ['class' => 'btn btn-success']) ?>
                </div>
            </div>
            <?php ActiveForm::end() ?>
        </div>
        <div class="forg">
            <a href="#" class="forg-left">Забыли пароль?</a>
            <a href="<?= Url::to(['user/signup'])?>" class="forg-right">Регистрация</a>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--login-->