<?php


namespace app\controllers;


use app\models\LoginForm;
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
            if($user->save()) {
                return $this->goHome();
            }
        }
        return $this->render('signup', compact('model'));
    }

    public function actionLogin()
    {
//        if (!Yii::$app->user->isGuest) {
//        return $this->goHome();
//    }
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
}