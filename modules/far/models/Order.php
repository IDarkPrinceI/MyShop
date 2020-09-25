<?php

namespace app\modules\far\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $created_at
 * @property string $updated_at
 * @property int $qty
 * @property float $sum
 * @property int $status
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string|null $note
 * @property int $user_id
 */
class Order extends ActiveRecord
{

    public static function tableName()
    {
        return 'orders';
    }

    public function getProducts() {
        return $this->hasMany(OrderProduct::class, ['order_id' => 'id']);
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
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
            [['created_at', 'updated_at', 'qty', 'name', 'email', 'phone', 'address', 'user_id'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['qty', 'status', 'user_id'], 'integer'],
            [['sum'], 'number'],
            [['note'], 'string'],
            [['name', 'email', 'phone', 'address'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Cоздан',
            'updated_at' => 'Обновлен',
            'qty' => 'Кол-во',
            'sum' => 'Сумма',
            'status' => 'Статус',
            'name' => 'Имя',
            'email' => 'E-mail',
            'phone' => 'Телефон',
            'address' => 'Адрес',
            'note' => 'Примечание',
            'user_id' => 'User ID',
        ];
    }
}
