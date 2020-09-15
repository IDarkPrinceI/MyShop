<?php


namespace app\modules\far\controllers;



use yii\web\Controller;
use yii\web\HttpException;

class AppFarController extends Controller
{
    public function beforeAction($action)
    {
        if (\Yii::$app->user->identity['role'] === 'admin') {
            return true;
        }
        throw new HttpException(
            406, 'К сожалению, для посещения данной страницы у Все нет доступа'
        );
    }
}