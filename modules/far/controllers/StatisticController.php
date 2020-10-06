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

            for ($i = 0, $result = $chooseDateTimeStamp + $oneDay; $i <= 7; $i++) {
                $result = $result - $oneDay;
                $dateBefore = \Yii::$app->formatter->asDate($result, 'php:Y-m-d');
                $resultDateBefore[$i] = $dateBefore;
                $oneWeekBefore[$i] = Statistic::find()
                    ->where(['date' => $dateBefore])
                    ->select('username')
                    ->distinct('username')
                    ->count();
            }

            $differenceDateDay = (($nowDateTimeStamp - $chooseDateTimeStamp) / $oneDay);
            if ($differenceDateDay) {
                if ($differenceDateDay < 7) {
//                    print_r('Меньше 7');
                    $result = $chooseDateTimeStamp + ($oneDay * $differenceDateDay);
                } else {
//                    print_r('Больше 7');
                    $result = $chooseDateTimeStamp + ($oneDay * 8);
                }
//                debug($result);
                for ($i = 0; $i <= $differenceDateDay && $i <= 6; $i++) {
                    $result = $result - $oneDay;
                    $dateAfter = \Yii::$app->formatter->asDate($result, 'php:Y-m-d');
                    $resultDateAfter[$i] = $dateAfter;
                    $numberDayAfter[$i] = Statistic::find()
                        ->where(['date' => $dateAfter])
                        ->select('username')
                        ->distinct('username')
                        ->count();
                }
            }
////                debug($numberDayAfter);
////                debug($resultDateAfter);
                return $this->renderPartial('includeIndex', compact(
                    'resultDateBefore',
                    'oneWeekBefore',
                    'numberDayAfter',
                    'resultDateAfter'));
            }
//        $nowDay = $oneWeekAfter[0];
//        unset($oneWeekAfter[0]);

        return $this->render('index');
    }
}