<?php

namespace app\models;

use Yii;
use yii\base\Model;


class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    public function attributeLabels()
    {
        return ['username' => 'Логин',
                'password' => 'Пароль'
               ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Некорректное имя пользователя или пароль.');
            }
        }
    }

    public function findByUsername($username)
    {
        return User::findOne(['username' => $username]);
    }

    public function login()
    {
        if ($this->validate()) {
            if($this->rememberMe) {
                $authKey = $this->getUser();
                $authKey->generateAuthKey();
                $authKey->save();
            }
//            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 60 : 0);
        }
        return false;
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }
        return $this->_user;
    }
}
