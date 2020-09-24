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
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'name', 'qty', 'sum'], 'required'],
            [['order_id', 'product_id', 'qty'], 'integer'],
            [['price', 'sum'], 'number'],
            [['name', 'img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'product_id' => 'Product ID',
            'name' => 'Name',
            'img' => 'Img',
            'price' => 'Price',
            'qty' => 'Qty',
            'sum' => 'Sum',
        ];
    }
}
