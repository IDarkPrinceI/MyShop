<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<?php //debug($userId);?>
<?php //debug(Yii::$app->user->identity) ?>
<?php //$test = $userId->orders ?>
<?php foreach($orders as $id); ?>
    <?php print_r($id) ?>
<!--content-->
<!--<div class="content">-->
<!--    <div class="cart-items">-->
<!--        <div class="container">-->
<!--            <h2 class="tittle">Личный кабинет</h2>-->
<!--            <div class="cart-table">-->
<!--                <table class="timetable_sub">-->
<!--                    <thead>-->
<!--                    <tr>-->
<!--                        <th>№</th>-->
<!--                        <th>Изображение</th>-->
<!--                        <th>Количество</th>-->
<!--                        <th>Описание</th>-->
<!--                        <th>Цена за еденицу</th>-->
<!--                        <th>Общая цена</th>-->
<!--                    </tr>-->
<!--                    </thead>-->
<!--                    <tbody>-->
<!--                    --><?php //$i = 1; foreach($session['cart'] as $id => $item): ?>
<!--                        <tr class="my_relactive">-->
<!--                            <td>--><?//= $i?><!--</td>-->
<!--                            <td>-->
<!--                                <a href="--><?//= Url::to(['product/view', 'id' => $id]) ?><!--">-->
<!--                                    --><?//= Html::img("@web/product_img/{$item['img']}", ['alt' => $item['name'],'height' => 60]) ?>
<!--                                </a>-->
<!--                            </td>-->
<!--                            <td>-->
<!--                                <div class="quantity">-->
<!--                                    <div class="quantity-select">-->
<!--                                        <div class="entry value-minus" id="minus" data-id="--><?//= $id ?><!--" data-qty="-1">&nbsp;</div>-->
<!--                                        <div class="entry value"><span>--><?//= $item['qty']?><!--</span></div>-->
<!--                                        <div class="entry value-plus active" id="plus" data-id="--><?//= $id ?><!--" data-qty="1">&nbsp;</div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </td>-->
<!--                            <td>--><?//= $item['name'] ?><!--</td>-->
<!--                            <td>--><?//= $item['price'] ?><!-- руб</td>-->
<!--                            <td>--><?//= $item['price'] * $item['qty'] ?><!-- руб</td>-->
<!--                            <td>-->
<!--                                <a class="close1" href="--><?//= \yii\helpers\Url::to(['cart/del-item', 'id' => $id])?><!--"></a>-->
<!--                            </td>-->
<!--                        </tr>-->
<!--                        --><?php //$i ++; endforeach; ?>
<!--                    </tbody></table>-->
<!--            </div>-->
<!--            <div class="checkout-left">-->
<!--                <div class="col-md-4 checkout-left-basket">-->
<!--                    <h4>Детали заказа</h4>-->
<!--                    <ul>-->
<!--                        <li>Количество товаров в корзине: <span>--><?//= $session['cart.qty']?><!-- шт.</span></li>-->
<!--                        <li>Итого: <span>--><?//= $session['cart.sum'] ?><!-- руб.</span></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="mail-grids">-->
<!--                <h4>Данные покупателя</h4>-->
<!--                --><?php //$form = \yii\widgets\ActiveForm::begin()?>
<!--                --><?//= $form->field($order, 'name') ?>
<!--                --><?//= $form->field($order, 'email') ?>
<!--                --><?//= $form->field($order, 'phone') ?>
<!--                --><?//= $form->field($order, 'address') ?>
<!--                --><?//= $form->field($order, 'note')->textarea(['rows' => 5]) ?>
<!--                --><?//= \yii\helpers\Html::submitButton('Заказать', ['class' => 'submit_check_out']) ?>
<!--                --><?php //\yii\widgets\ActiveForm::end() ?>
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<!-- checkout -->
