<?php

$this->title = 'Статистика посетителей';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="box">
        <div class="box-header with-border">
                <!--    <p>-->
                <!--        --><?//= Html::a('Добавить заказ', ['create'], ['class' => 'btn btn-success']) ?>
                <!--    </p>-->
        </div>
        <div class="box-body">
<h3>Выберите дату:</h3>
                <input type="text" id="datepicker">
                <button id="userStatistic">Показать</button>
         </div>
        <div>
            <?= $this->render('includeIndex', compact('chooseDate')) ?>
        </div>
    </div>
</div>

