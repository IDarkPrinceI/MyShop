<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
//    public $id;
//    public $username;
//    public $password;
//    public $authKey;
//    public $accessToken;

    public static function tableName()
    {
        return 'user';
    }


    public static function findIdentity($id)
    {
        $id = (int)$id;
        return User::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
//        foreach (self::$users as $user) {
//            if ($user['accessToken'] === $token) {
//                return new static($user);
//            }
//        }
//
//        return null;
    }
    
    public function findByUsername($username)
    {
        return User::findOne(['username' => $username]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function login()
    {
//        if ($this->validate()) {
//            return Yii::$app->user->login($this->getUser());
//        }
//        return false;
    }

    public function getUser()
    {
//        if ($this->_user === false) {
//            $this->_user = $this::findByUsername($this->username);
//        }
//
//        return $this->_user;
    }
}
