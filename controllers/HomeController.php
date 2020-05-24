<?php


namespace app\controllers;


use app\models\Category;

class HomeController extends AppHomeController
{

    public function actionIndex()
    {
        $category = Category::find()->all();
        return $this->render('index', compact('category'));
    }




}