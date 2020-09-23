<?php


namespace app\models;


use yii\base\Model;

class Signup extends Model
{

    public $username;
    public $password;
    public $email;
    public $phone;
    public $address;


    public function rules()
    {
        return [
               [['username', 'password'], 'required', 'message' => 'Заполните поле'],
               ['email', 'email'],
               ['phone', 'number'],
               ['address', 'string'],
//               ['registred_at', 'safe'],
               ['username', 'unique', 'targetClass' => User::class, 'message' => 'Этот логин занят, попробуйте другой']
               ];
    }

    public function attributeLabels()
    {
        return [
                'username' => 'Логин',
                'password' => 'Пароль',
                'email' => 'E-mail',
                'phone' => 'Телефон',
                'address' => 'Адрес'
               ];
    }
}