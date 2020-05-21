<?php


namespace app\controllers;


class HomeController extends AppHomeController
{

    public function actionIndex()
    {
        return $this->render('index');
    }

}