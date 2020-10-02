<?php


namespace app\modules\far\controllers;


use app\models\Order;
use app\models\Statistics;
use app\modules\far\models\Brand;
use app\modules\far\models\Category;
use app\modules\far\models\Product;
use yii\db\Expression;
use yii\i18n\Formatter;

class HomeController extends AppFarController
{

    public function actionIndex()
    {
        $timeStart = (10000);
        $timeEnd = (9999999);
        $timeStartFormat = \Yii::$app->formatter->asTime($timeStart);
        $timeEndFormat = \Yii::$app->formatter->asTime($timeEnd);
//        debug($timeEndFormat);


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
        $unuqueUsers = Statistics::find()

            ->where(['>', 'time',$timeStartFormat])
            ->andwhere(['>', 'time',$timeStartFormat])
            ->select('username')
            ->distinct()
            ->asArray()
            ->count();
        debug($unuqueUsers);

//        $dateToday = date('Y-m-d H:i:s');
//        $test = \Yii::$app->formatter->asTimestamp($dateToday);

        return $this->render('index', compact('newOrders',
                                                        'products',
                                                          'categories',
                                                          'brands',
                                                          'session'));
    }
}