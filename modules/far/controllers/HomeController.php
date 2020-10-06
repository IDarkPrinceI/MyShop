<?php


namespace app\modules\far\controllers;


use app\models\Order;
use app\modules\far\models\Statistic;
use app\modules\far\models\Brand;
use app\modules\far\models\Category;
use app\modules\far\models\Product;

class HomeController extends AppFarController
{

    public function actionIndex()
    {

        $nowDay = date('Y-m-d');

        $uniqueUsers = Statistic::find()
            ->where(['date' => $nowDay])
            ->select('username')
            ->distinct('username')
            ->asArray()
            ->count();

        $newOrders = Order::find()
            ->where(['status' => 0])
            ->count();
        $session = \Yii::$app->session;
        $session->open();
            $session['newOrders']= $newOrders;

        $products = Product::find()
            ->count();
        $categories = Category::find()
            ->count();
        $brands = Brand::find()
            ->count();

        return $this->render('index', compact('newOrders',
                                                        'products',
                                                          'categories',
                                                          'brands',
                                                          'session',
                                                          'uniqueUsers'));
    }
}