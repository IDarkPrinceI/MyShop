




<div class="dropdown menu" >
    <a  <?php if($category['parent_id']) : ?>
            href="<?= \yii\helpers\Url::to(['category/view', 'category_id' => $category['id']])?>">
    <?php endif; ?>

        <?php if(isset($category['children']))
            echo 'class="btn btn-secondary dropdown-toggle" 
                        data-toggle="dropdown" 
                        role="button" id="dropdownMenuLink"  
                        aria-haspopup="true" 
                        aria-expanded="false",
                        style="background: url(../images/icons1.png) no-repeat 10px 9px !important;"' ?>>
        <?= $category['name'] ?>
        <li class="divider"></li>
    </a>
    <?php if(isset($category['children'])): ?>
    <div class="dropdown-menu">
        <ul class="dropdown-item">
        <?= $this->getMenuHtml($category['children']) ?>
        </ul>
    </div>
    <?php endif; ?>
</div>




