<?php


namespace app\modules\far\controllers;


use app\models\Order;
use yii\i18n\Formatter;

class HomeController extends AppFarController
{

    public function actionIndex()
    {
        $newOrders = Order::find()
            ->where(['status' => 1])
            ->count();
        \Yii::$app->params['newOrders'] = $newOrders;

//        $dateToday = date('Y-m-d H:i:s');
//        $test = \Yii::$app->formatter->asTimestamp($dateToday);

        return $this->render('index', compact('newOrders'));
    }

    public function actionTest()
    {
        return $this->render('test');
    }
}