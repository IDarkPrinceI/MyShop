<?php //$baseChooseDate?>
<div class="testClass" id="testDate">
    <?php if($resultDate): ?>
    <p>____________________________________________________________</p>
        <div class="col-md-3">
            <p>Дата</p>
                <li class="divider"></li>
                <?php foreach ($resultDate as $day): ?>
                    <?php if($day === $nowDate && $day === $baseChooseDate): ?>
                        <p class="text-green">Сегодня <span class="text-red">(Выбранная дата)</span></p>
                    <?php elseif ($day === $nowDate): ?>
                        <p class="text-green">Сегодня</p>
                    <?php elseif ($day === $baseChooseDate): ?>
                        <p class="text-red">Выбранная дата</p>
                    <?php else: ?>
                        <p><?= $day ?></p>
                    <?php endif; ?>
                <?php endforeach; ?>
        </div>
        <div class="col-md-2">
             <p>Посетителей</p>
                <li class="divider"></li>
                 <?php foreach ($oneWeek as $number): ?>
                     <p><?= $number?></p>
                 <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
