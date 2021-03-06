<?php


namespace app\models;


use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

class Order extends ActiveRecord
{
    public static function tableName()
    {
        return 'orders';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'address'], 'required'],
            ['note', 'string'],
            ['email', 'email'],
//            [   'phone',
//                'match',
//                'pattern' => '~^\+7\s\[0-9]{3}\\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}$~',
//                'message' => 'Номер телефона должен соответствовать шаблону +7 495 123 45 67'
//            ],
            [['created_at', 'updated_at'], 'safe'],
            [['qty', 'user_id'], 'integer'],
            [['sum', 'phone'], 'number'],
            ['status', 'boolean'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'E-mail',
            'phone' => 'Телефон',
            'address' => 'Адрес',
            'note' => 'Примечание',
        ];
    }

    public function getOrderProducts()
    {
        return $this->hasMany(OrderProduct::class, ['order_id' => 'id']);
    }

    public function getOrders($userId) {
        $orders = Order::find()
            ->asArray()
            ->joinWith('orderProducts')
            ->select([OrderProduct::tableName() . '.product_id' , 'img', 'price'])
            ->addselect([OrderProduct::tableName() . '.sum'])
            ->addselect([OrderProduct::tableName() . '.qty'])
            ->addselect([Order::tableName() . '.status', 'created_at'])
            ->where(['user_id' => $userId])
            ->orderBy(['created_at' => SORT_DESC])
            ->all();
        return $orders;
    }


}