




<div class="dropdown show">
    <a  <?php if($category['parent_id']) : ?>
            href="<?= \yii\helpers\Url::to(['category/view', 'id' => $category['id']])?>"
    <?php endif; ?>

        <?php if(isset($category['children'])) echo 'class="btn btn-secondary dropdown-toggle"' ?> role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?= $category['name'] ?>
        <li class="divider"></li>
    </a>
    <?php if(isset($category['children'])): ?>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <ul class="dropdown-item">
        <?= $this->getMenuHtml($category['children']) ?>
        </ul>
    </div>
    <?php endif; ?>
</div>




