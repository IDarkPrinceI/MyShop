<?php


namespace app\controllers;


use app\models\Category;
use app\models\Product;

class HomeController extends AppHomeController
{

    public function actionIndex()
    {
        $productNew = Product::find()->where(['is_new' => 1])->all();
        return $this->render('index', compact('productNew'));
    }




}