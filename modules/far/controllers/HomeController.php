<?php


namespace app\modules\far\controllers;


use app\models\Order;
use app\modules\far\models\Category;
use app\modules\far\models\Product;
use yii\i18n\Formatter;

class HomeController extends AppFarController
{

    public function actionIndex()
    {
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

//        $dateToday = date('Y-m-d H:i:s');
//        $test = \Yii::$app->formatter->asTimestamp($dateToday);

        return $this->render('index', compact('newOrders',
                                                        'products',
                                                          'categories',
                                                          'session'));
    }
}