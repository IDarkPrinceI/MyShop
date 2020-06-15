<?php


namespace app\models;


use yii\db\ActiveRecord;

class OrderProduct extends ActiveRecord
{

    public static function tableName()
    {
        return 'order_product';
    }

    public function rules()
    {
        return [
            [['order_id', 'product_id', 'name', 'price', 'qty', 'sum'], 'required'],
            [['order_id', 'product_id', 'qty'], 'integer'],
            [['price', 'sum'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function saveOrderProducts($products, $order_id)
    {
        foreach($products as $id => $product)
        {
            $this->id = null;
            $this->isNewRecord = true;
            $this->order_id = $order_id;
            $this->product_id = $id;
            $this->name = $product['name'];
            $this->price = $product['price'];
            $this->qty = $product['qty'];
            $this->sum = $product['qty'] * $product['price'];
            if(!$this->save()) {
                return false;
            }
        }
        return true;
    }
}