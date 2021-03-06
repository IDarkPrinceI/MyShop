<?php


namespace app\controllers;


use app\models\LoginForm;
use app\models\Order;
use app\models\Signup;
use app\modules\far\models\Statistic;
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

        if( $model->load(Yii::$app->request->post()) && $model->validate() ) {

                $user = new User();
                $user->username = $model->username;
                $user->password = Yii::$app->security->generatePasswordHash($model->password);
                $user->email = $model->email;
                $user->phone = $model->phone;
                $user->address = $model->address;
                if($model->password === $model->passwordRepl) {
                    if ($user->save()) {
                        return $this->goBack();
                    }
                }
            Yii::$app->session->setFlash('error', 'Пароли не совпадают');
        }
        return $this->render('signup', compact('model'));
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
        return $this->goHome();
    }
        $user = new LoginForm();

        if ( $user->load(Yii::$app->request->post()) && $user->login() ) {

            if (Yii::$app->user->identity['role'] === 'admin') {
                return $this->redirect(['far/home/index']);
            }

            $statistics = new Statistic();
            $statistics->username = $user->username;
            $statistics->save();

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
        //изменить данные пользователя
        $userData = new Signup();
            if ( $userData->load(Yii::$app->request->post()) ) {
                $user = new User();
                $userId = Yii::$app->user->identity['id'];
                $string = User::find()
                    ->where(['id' => $userId])
                    ->one();
                $string->delete();
                $user->id = Yii::$app->user->identity['id'];
                $user->username = Yii::$app->user->identity['username'];
                $user->password = Yii::$app->user->identity['password'];
                $user->email = $userData->email;
                $user->phone = $userData->phone;
                $user->address = $userData->address;
                if($user->save()) {
                    return  $this->refresh();
                }
         //изменить данные пользователя
            }
        return $this->render('profile', compact('orders', 'userData'));
    }
}