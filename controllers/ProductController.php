<?php


namespace app\controllers;

use Yii;
use app\models\Product;
use yii\data\Pagination;
use yii\data\Sort;
use yii\web\NotFoundHttpException;

class ProductController extends AppHomeController
{

    public function actionView($id)
    {

        $product = Product::findOne($id);

        //404
        if (empty($product)) {
            throw new NotFoundHttpException('Запрашиваемая страница не существует.');
        }
        //404

        //set Meta
        $this->setMeta("{$product->name}", $product->keywords, $product->description);
        //set Meta

        //        pagination product
        $query = Product::find()->where(['is_sale' => 1]);
        $pages = new Pagination(['totalCount' => $query->count(),
            'pageSize' => 4,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $sale_product = $query->offset($pages->offset)->limit($pages->limit)->all();
        //        pagination product

        return $this->render('view', compact('product','sale_product', 'pages'));
    }


    public function actionSearch()
    {
        $search = trim(Yii::$app->request->get('search'));

        //set Meta
        $this->setMeta("Поиск: {$search} ");
        //set Meta

        //404
        if (empty($search)) {
            return $this->render('search');
        }
        //404

        //pagination search
        $query = Product::find()->where(['like', 'name', $search]);
        $pages = new Pagination(['totalCount' => $query->count(),
            'pageSize' => 3,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $searchProducts = $query->offset($pages->offset)->limit($pages->limit)->all();
        //pagination search

        return $this->render('search', compact('searchProducts', 'pages', 'search'));
    }


}