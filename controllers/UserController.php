<?php


namespace app\controllers;


use app\models\LoginForm;
use app\models\Order;
use app\models\Signup;
use app\models\User;
use Yii;

class UserController extends AppHomeController
{

    public function actionSignup()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new Signup();
        if($model->load(Yii::$app->request->post()) && $model->validate()) {
            $user = new User();
            $user->username = $model->username;
            $user->password = Yii::$app->security->generatePasswordHash($model->password);
            $user->email = $model->email;
            $user->phone = $model->phone;
            $user->address = $model->address;
            if($user->save()) {
                return $this->goBack();
            }
        }
        return $this->render('signup', compact('model'));
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
        return $this->goHome();
    }
        $user = new LoginForm();
        if ($user->load(Yii::$app->request->post()) && $user->login()) {
            return $this->goHome();
        }
        return $this->render('login', [
            'model' => $user]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionProfile()
    {
        $user = Yii::$app->user->id;

        $orders = (new Order())->getOrders($user);
//        $orders = new User();
//        $orders = $user->orders;
//        debug($orders);
//        $userId = Yii::$app->user->getId();
//        $order = new User();
//        $order->getOrders();

//        debug($order);
        return $this->render('profile', compact('orders'));
    }
}