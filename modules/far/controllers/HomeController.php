<?php


namespace app\modules\far\controllers;


class HomeController extends AppFarController
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionTest()
    {
        return $this->render('test');
    }
}