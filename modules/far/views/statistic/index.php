<?php
use app\assets\StatisticAsset;

StatisticAsset::register($this);

$this->title = 'Статистика посетителей';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="box">
        <div class="box-header with-border">
        </div>
        <div class="box-body">
            <h3>Выберите дату:</h3>
            <input type="text" id="datepicker">
            <button id="userStatistic">Показать</button>

            <?= $this->render('includeIndex', compact('chooseDate','$resultDateBefore',
                '$oneWeekBefore')); ?>

        </div>
    </div>
</div>

