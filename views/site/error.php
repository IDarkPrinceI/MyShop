<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error container">

    <h1 id="error_404"><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p id="my_error">
        Произошла ошибка, так как запрашиваемой страницы не найдено.
        Пожалуйста, сообщите нам об ошибке. Спасибо!
    </p>

</div>
