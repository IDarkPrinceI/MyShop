<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<?php $this->title = 'Личный кабинет'?>

<!--content-->
<div class="content">
    <div class="cart-items">
        <div class="container">
            <h2 class="tittle">Личный кабинет</h2>
            <div class="checkout-left">
                <div class="col-md-4 checkout-left-basket">
                    <h4>Детали заказа</h4>
                    <ul>
                        <!--                        <li>Количество товаров в корзине: <span>--><?//= $session['cart.qty']?><!-- шт.</span></li>-->
                        <!--                        <li>Итого: <span>--><?//= $session['cart.sum'] ?><!-- руб.</span></li>-->
                    </ul>
                </div>
            </div>
            <div class="mail-grids">
                <h4>Ваши персональные данные</h4>
                <?php $userEmail = Yii::$app->user->identity['email']; ?>
                <?php $userPhone = Yii::$app->user->identity['phone']; ?>
                <?php $userAddress = Yii::$app->user->identity['address']; ?>

                <?php $form = \yii\widgets\ActiveForm::begin()?>
                <?= $form->field($userData, 'email')->input('string', ['value' => $userEmail]) ?>
                <?= $form->field($userData, 'phone')->input('string', ['value' => $userPhone]) ?>
                <?= $form->field($userData, 'address')->input('string', ['value' => $userAddress]) ?>
                <?= \yii\helpers\Html::submitButton('Изменить', ['class' => 'submit_check_out']) ?>
                <?php \yii\widgets\ActiveForm::end() ?>
            </div>
            <div class="clearfix"></div>
            <div class="cart-table">
                <?php if($orders) :?>
                <table class="timetable_sub">
                    <thead>
                    <h3>История Ваших заказов:</h3>
                    <tr>
                        <th>№</th>
                        <th>Изображение</th>
                        <th>Количество</th>
                        <th>Цена за еденицу</th>
                        <th>Общая цена</th>
                        <th>Дата создания</th>
                        <th>Статус</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; foreach($orders as $item): ?>
                        <tr class="my_relactive">
                            <td><?= $i?></td>
                            <td>
                                <a href="<?= Url::to(['product/view', 'id' => $item['product_id']]) ?>">
                                    <?= Html::img("@web/product_img/{$item['img']}", ['alt' => $item['name'],'height' => 60]) ?>
                                </a>
                            </td>
                            <td>
                                <div class="quantity">
                                    <div class="quantity-select">
                                        <div><span><?= $item['qty']?></span></div>
                                    </div>
                                </div>
                            </td>

                            <td><?= $item['price'] ?> руб</td>
                            <td><?= $item['sum']?> руб</td>
                            <td><?= $item['created_at'] ?></td>
                            <?php if ($item['status'] ):  ?>
                                <td class="ready">Завершен</td>
                            <?php else: ?>
                                <td class="wait">В работе</td>
                            <?php endif; ?>
                        </tr>
                        <?php $i ++; endforeach; ?>
                    </tbody></table>
                <?php else: ?>
                <h3>Вы еще ничего не заказали...</h3>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>

<!-- checkout -->
