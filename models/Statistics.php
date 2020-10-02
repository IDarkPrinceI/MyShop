<?php


namespace app\models;


use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

class Statistics extends ActiveRecord
{

    public static function tableName()
    {
        return 'statistics';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['time'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function rules()
    {
        return [
          [['username','time'],'required'],
        ];
    }

    public function activeAttributes()
    {
        return ['username' => 'Имя пользователя'];
    }

}