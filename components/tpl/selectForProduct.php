<?php //debug($category);?>
<option
        value="<?= $category['id']?>"
>
    <?= " {$tab} {$category['name']} " ?>
</option>
<?php if( isset($category['children'])) : ?>
    <?= $this->getMenuHtml($category['children'], $tab . '--') ?>
<?php endif; ?>
