<?php


namespace app\modules\far\models;


use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

class Statistic extends ActiveRecord
{

    public static function tableName()
    {
        return 'statistic';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['time', 'date'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function rules()
    {
        return [
          [['username','time','date'],'required'],
          ['date', 'date', 'format' => 'php:Y-m-d']
        ];
    }

    public function activeAttributes()
    {
        return ['username' => 'Имя пользователя'];
    }

}