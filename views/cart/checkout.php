<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>


<!--content-->
<div class="content">
    <div class="cart-items">
        <div class="container">

            <?= \app\widgets\Alert::widget() ?>
<!--            --><?php
//            debug($order->errors);  если хотим увидеть ошибки, которые привели к откату транзакции
//            debug($order_product->errors);
//            ?>
            <h2 class="tittle">Оформление заказа</h2>
            <?php if(!empty($session['cart'])): ?>
            <div class="cart-table">
                <div class="overlay">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
                <table class="timetable_sub">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Изображение</th>
                        <th>Количество</th>
                        <th>Описание</th>
                        <th>Цена за еденицу</th>
                        <th>Общая цена</th>
                        <th>Удалить</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; foreach($session['cart'] as $id => $item): ?>
                        <tr class="my_relactive">
                            <td><?= $i?></td>
                            <td>
                                <a href="<?= Url::to(['product/view', 'id' => $id]) ?>">
                                    <?= Html::img("@web/uploads/product/{$item['img']}", ['alt' => $item['name'],'height' => 60]) ?>
                                </a>
                            </td>
                            <td>
                                <div class="quantity">
                                    <div class="quantity-select">
                                        <div class="entry value-minus" id="minus" data-id="<?= $id ?>" data-qty="-1">&nbsp;</div>
                                        <div class="entry value"><span><?= $item['qty']?></span></div>
                                        <div class="entry value-plus active" id="plus" data-id="<?= $id ?>" data-qty="1">&nbsp;</div>
                                    </div>
                                </div>
                            </td>
                            <td><?= $item['name'] ?></td>
                            <td><?= $item['price'] ?> руб</td>
                            <td><?= $item['price'] * $item['qty'] ?> руб</td>
                            <td>
                                <a class="close1" href="<?= Url::to(['cart/del-item', 'id' => $id])?>"></a>
                            </td>
                        </tr>
                        <?php $i ++; endforeach; ?>
                    </tbody></table>
            </div>
                <div class="checkout-left">
                    <div class="col-md-4 checkout-left-basket">
                    <h4>Детали заказа</h4>
                        <ul>
                            <li>Количество товаров в корзине: <span><?= $session['cart.qty']?> шт.</span></li>
                            <li>Итого: <span><?= $session['cart.sum'] ?> руб.</span></li>
                        </ul>
                    </div>
               </div>
                <div class="mail-grids">
                    <h4>Данные покупателя</h4>
                            <?php $userName = Yii::$app->user->identity['username']; ?>
                            <?php $userEmail = Yii::$app->user->identity['email']; ?>
                            <?php $userPhone = Yii::$app->user->identity['phone']; ?>
                            <?php $userAddress = Yii::$app->user->identity['address']; ?>

                            <?php $form = \yii\widgets\ActiveForm::begin()?>
                            <?= $form->field($order, 'name')->input('string',['value' => $userName]) ?>
                            <?= $form->field($order, 'email')->input('string',['value' => $userEmail]) ?>
                            <?= $form->field($order, 'phone')->input('string',['value' => $userPhone]) ?>
                            <?= $form->field($order, 'address')->input('string',['value' => $userAddress]) ?>
                            <?= $form->field($order, 'note')->textarea(['rows' => 5]) ?>
                            <?= Html::submitButton('Заказать', ['class' => 'submit_check_out']) ?>
                            <?php \yii\widgets\ActiveForm::end() ?>
                      </div>
                </div>
            </div>
            <?php else: ?>
            <h3 class="middle">Ваша корзина пуста</h3>
            <?php endif;?>
        </div>
    </div>
    <!-- checkout -->
</div>