
<?php // debug($numberDayAfter);
//                debug($resultDateAfter);?>
<div class="testClass" id="testDate">
    <?php if($resultDateBefore) : ?>
    <p>_______________________________________</p>
        <div class="col-md-2">
            <p>Дата</p>
            <li class="divider"></li>
            <?php if($resultDateAfter): ?>
            <?php foreach ($resultDateAfter as $dayAfter): ?>
                <p><?= $dayAfter ?></p>
                <?php endforeach; ?>
                <li class="divider"></li>
            <?php endif; ?>
            <?php foreach ($resultDateBefore as $day): ?>
                    <p><?= $day ?></p>
                <?php endforeach; ?>
        </div>
        <div class="col-md-2">
             <p>Посетителей</p>
             <li class="divider"></li>
                 <?php foreach ($oneWeekBefore as $number): ?>
                     <p><?= $number?></p>
                 <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
