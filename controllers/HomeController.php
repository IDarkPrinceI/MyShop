<?php


namespace app\controllers;


use app\models\Product;
use yii\data\Pagination;

class HomeController extends AppHomeController
{

    public function actionIndex()
    {
        $this->setMeta(\Yii::$app->params['shopName'],
                        \Yii::$app->params['defaultKeywords'],
                        \Yii::$app->params['defaultDescription']);

        $productNew = Product::find()
            ->where(['is_new' => 1])
            ->orderBy('RAND()')
            ->limit(4)
            ->all();
        //pagination productNew
//        $pagesNew = new Pagination(['totalCount' => $queryNew->count(),
//            'pageSize' => 4,
//            'pageParam' => 'pageNew',
//            'forcePageParam' => false,
//            'pageSizeParam' => false
//        ]);
//        $productNew = $queryNew
//            ->offset($pagesNew->offset)
//            ->limit($pagesNew->limit)
//            ->all();
        //pagination productNew

        $productHit = Product::find()
            ->where(['is_hit' => 1])
            ->orderBy('RAND()')
            ->limit(4)
            ->all();
        //pagination productHit
//        $pagesHit = new Pagination(['totalCount' => $queryHit->count(),
//            'pageSize' => 4,
//            'pageParam' => 'pageHit',
//            'forcePageParam' => false,
//            'pageSizeParam' => false
//        ]);
//        $productHit = $queryHit
//            ->offset($pagesHit->offset)
//            ->limit($pagesHit->limit)
//            ->all();
        //pagination productHit

        return $this->render('index', compact(
            'productNew',
                  'pagesNew',
                    'productHit',
                    'pagesHit'));
    }




}