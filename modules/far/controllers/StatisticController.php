<?php


namespace app\modules\far\controllers;


use app\modules\far\models\Statistic;

class StatisticController extends AppFarController
{

    public function actionIndex()
    {

        if (\Yii::$app->request->get()) {
            $baseChooseDate = \Yii::$app->request->get('chooseDate');
            $nowDate = date('Y-m-d');
            $oneDay = 86400;
            $nowDateTimeStamp = \Yii::$app->formatter->asTimestamp($nowDate);
            $chooseDateTimeStamp = \Yii::$app->formatter->asTimestamp($baseChooseDate);

            $differenceDateDay = (($nowDateTimeStamp - $chooseDateTimeStamp) / $oneDay);
            if ($differenceDateDay) {
                if ($differenceDateDay < 7) {
                    $result = $chooseDateTimeStamp + ($oneDay * $differenceDateDay) + $oneDay;
                    $count = 13;
                } else {
                    $result = $chooseDateTimeStamp + ($oneDay * 8);
                    $count = 14;
                }
            } else {
                $result = $chooseDateTimeStamp + $oneDay;
                $count = 7;
            }
            for ($i = 0; $i <= $count; $i++) {
                $result = $result - $oneDay;
                $dateTimeStamp = \Yii::$app->formatter->asDate($result, 'php:Y-m-d');
                $resultDate[$i] = $dateTimeStamp;
                $oneWeek[$i] = Statistic::find()
                    ->where(['date' => $dateTimeStamp])
                    ->select('username')
                    ->distinct('username')
                    ->count();
            }
            $baseChooseDate = \Yii::$app->formatter->asDate($baseChooseDate, 'php:Y-m-d');
            return $this->renderPartial('includeIndex', compact(
                                     'resultDate',
                                          'oneWeek',
                                             'nowDate',
                                             'baseChooseDate'));
        }
        return $this->render('index');
    }
}