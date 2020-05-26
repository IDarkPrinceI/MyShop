<?php


namespace app\controllers;


use app\models\Category;
use app\models\Product;
use yii\data\Pagination;

class HomeController extends AppHomeController
{

    public function actionIndex()
    {
        $query = Product::find()->where(['is_new' => 1]);
        //pagination product
        $pages = new Pagination(['totalCount' => $query->count(),
            'pageSize' => 4,
            'forcePageParam' => true,
            'pageSizeParam' => false
        ]);
        $productNew = $query->offset($pages->offset)->limit($pages->limit)->all();
        //pagination product

        return $this->render('index', compact('productNew', 'pages'));
    }




}