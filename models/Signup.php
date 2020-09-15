<?php


namespace app\models;


use yii\base\Model;

class Signup extends Model
{

    public $username;
    public $password;

    public function rules()
    {
        return [
               [['username', 'password'], 'required', 'message' => 'Заполните поле'],
               ['username', 'unique', 'targetClass' => User::class, 'message' => 'Этот логин занят, попробуйте другой']
               ];
    }

    public function attributeLabels()
    {
        return [
                'username' => 'Логин',
                'password' => 'Пароль',
               ];
    }
}