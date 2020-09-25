<?php

namespace app\modules\far\models;

use Yii;

/**
 * This is the model class for table "order_product".
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property string $name
 * @property string $img
 * @property float $price
 * @property int $qty
 * @property float $sum
 */
class OrderProduct extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'order_product';
    }

    public function getOrder() {
        return $this->hasOne(Order::class, ['id' => 'order_id']);
    }

    public function rules()
    {
        return [
            [['order_id', 'product_id', 'name', 'qty', 'sum'], 'required'],
            [['order_id', 'product_id', 'qty'], 'integer'],
            [['price', 'sum'], 'number'],
            [['name', 'img'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => '№ заказа',
            'product_id' => '№ продукта',
            'name' => 'Название',
            'img' => 'Изображение',
            'price' => 'Цеа',
            'qty' => 'Количество',
            'sum' => 'Сумма',
        ];
    }
}
