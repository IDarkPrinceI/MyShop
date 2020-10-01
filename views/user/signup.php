<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>

<?php $this->title = 'Регистарция на сайте' ?>

<?php if (Yii::$app->session->hasFlash('error')) :?>
<div class="container alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?php echo Yii::$app->session->getFlash('error') ?>
</div>
<?php endif;?>

<div class="login">
    <div class="main-agileits">
        <div class="form-w3agile">
            <h3>Регистрация на сайте</h3>
            <?php $form = ActiveForm::begin() ?>
            <?= $form->field($model, 'username',
                ['template' => "<div class='form-group has-feedback'> {input} 
<span class=\"glyphicon glyphicon-king form-control-feedback\"></span>
<div>{error}</div></div>",])->textInput(['placeholder' => 'Логин *', 'autocomplete' => 'off']) ?>

            <?= $form->field($model, 'password',
                ['template' => "<div class='form-group has-feedback'> {input} 
<span class=\"glyphicon glyphicon-equalizer form-control-feedback\"></span>
<div>{error}</div></div>",])->passwordInput(['placeholder' => 'Пароль *','autocomplete' => 'off']) ?>

            <?= $form->field($model, 'passwordRepl',
                ['template' => "<div class='form-group has-feedback'> {input} 
<span class=\"glyphicon glyphicon-equalizer form-control-feedback\"></span>
<div>{error}</div></div>",])->passwordInput(['placeholder' => 'Повторите пароль *','autocomplete' => 'off']) ?>

            <?= $form->field($model, 'email',
                ['template' => "<div class='form-group has-feedback'> {input} 
<span class=\"glyphicon glyphicon-text-background form-control-feedback\"></span>
<div>{error}</div></div>",])->textInput(['placeholder' => 'E-mail','autocomplete' => 'off']) ?>

            <?= $form->field($model, 'phone',
                ['template' => "<div class='form-group has-feedback'> {input} 
<span class=\"glyphicon glyphicon-phone form-control-feedback\"></span>
<div>{error}</div></div>",])->textInput(['placeholder' => 'Телефон','autocomplete' => 'off']) ?>
            <?= $form->field($model, 'address',
                ['template' => "<div class='form-group has-feedback'> {input} 
<span class=\"glyphicon glyphicon-home form-control-feedback\"></span>
<div>{error}</div></div>",])->textInput(['placeholder' => 'Адрес','autocomplete' => 'off']) ?>
            <div id="map"></div>
            <div class="form-group">
                <div>
                    <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary btn-block btn-flat']) ?>
                </div>
                <div class="myButtonLogin forg-right">
                    <span>Есть учетная запись?</span>
                    <a class="btn btn-primary" href="<?= \yii\helpers\Url::to(['user/login'])?>">Войти</a>
                </div>
            </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>
