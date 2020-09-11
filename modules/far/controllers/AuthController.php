<?php


namespace app\modules\far\controllers;


use app\models\LoginForm;
use Yii;

class AuthController extends AppFarController
{

    public $layout = 'auth';
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect('/far');
//            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('/far');
//            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect('/far');
//        return $this->goHome();
    }

}