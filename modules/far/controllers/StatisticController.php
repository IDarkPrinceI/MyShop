<?php


namespace app\modules\far\controllers;


use app\modules\far\models\Statistic;

class StatisticController extends AppFarController
{

    public function actionIndex()
    {
        if (\Yii::$app->request->get()) {
            $baseChooseDate = \Yii::$app->request->get('chooseDate');
            $chooseDate = \Yii::$app->formatter->asDate($baseChooseDate, 'php:Y-m-d');
            $uniqueUsers = Statistic::find()
                ->where(['date' => $chooseDate])
                ->select('username')
                ->distinct('username')
                ->count();
            return $this->renderPartial('includeIndex', compact('uniqueUsers'));
        }
        return $this->render('index');
    }

}