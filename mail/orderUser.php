
<div class="table-responsive">
    <!--Перед отправкой реального сообщения мы изменили стили.
     Так как зачастую при отправке сообщений бывают проблеммы со
     стилям. То мы прописав их прям тут (инлаиновые)
    (21.4 Отправка почты)-->
    <h2>Добрый день!</h2>
    <h3>Вы успешно оформили заказ №:<span style="color: #e0177f;"><?= $orderId ?></span> на сайте "Instrumental: all for you".
    В скором времени с Вами свяжется администратор для уточнения
    деталей заказа</h3>
    <table style="width: 100%; border: 1px solid #ddd; border-collapse: collapse;">
        <thead>
        <tr style="background: #798ca2">
<!--            <th style="padding: 8px; border: 1px solid #ddd; color: #ffffff;">Фото</th>-->
            <th style="padding: 8px; border: 1px solid #ddd; color: #ffffff;">Наименование</th>
            <th style="padding: 8px; border: 1px solid #ddd; color: #ffffff;">Кол-во</th>
            <th style="padding: 8px; border: 1px solid #ddd; color: #ffffff;">Цена, руб.</th>
            <th style="padding: 8px; border: 1px solid #ddd; color: #ffffff;">Сумма, руб.</th>
        </tr>
        </thead>
        <tbody style="background: #8ebebe">
        <?php foreach ($session['cart'] as $id => $item): ?>
            <tr>
                <!--Чтобы прекрепить ссылку на товар необходимо добавить как обычно
                через Urlhelper ссылку на controller и action, передав id.
                Нужно добавить еще параметр true. Для того, чтобы ссылки генерировались
                с нашим доменом сайта. Не были относительные(21.4 Отправка почты)-->
<!--                <td style="padding: 8px; border: 1px solid #ddd; text-align: center; color: #ffffff;">-->
<!--                    <img src="--><?//= $message->embed($imageFileName); ?><!--"></td>-->
                <td style="padding: 8px; border: 1px solid #ddd; text-align: center;"><a style="color: #ffffff;" href="<?= \yii\helpers\Url::to(['product/view',
                        'id'=> $id], true)?>"><?= $item['name']?></a></td>
                <td style="padding: 8px; border: 1px solid #ddd; text-align: center; color: #ffffff;"><?= $item['qty']?></td>
                <td style="padding: 8px; border: 1px solid #ddd; text-align: center; color: #ffffff;"><?= $item['price']?></td>
                <td style="padding: 8px; border: 1px solid #ddd; text-align: center; color: #ffffff;"><?= $item['qty'] * $item['price']?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3" style="padding: 8px; border: 1px solid #ddd; color: #ffffff; ">Итого: </td>
            <td style="padding: 8px; border: 1px solid #ddd; text-align: center; color: #ffffff;"><?= $session['cart.qty']?></td>
        </tr>
        <tr>
            <td colspan="3" style="padding: 8px; border: 1px solid #ddd; color: #ffffff;">На сумму: </td>
            <td style="padding: 8px; border: 1px solid #ddd; text-align: center; color: #ffffff;"><?= $session['cart.sum']?></td>
        </tr>
        </tbody>
    </table>
</div>