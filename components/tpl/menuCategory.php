


<div class="dropdown show">
    <a <?php if(isset($category['children'])) ?> class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?= $category['name'] ?>
    </a>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

        <?php if(isset($category['children'])): ?>
        <li><?= $this->getMenuHtml($category['children']) ?></li>
        <?php endif; ?>
        </a>

    </div>
</div>





