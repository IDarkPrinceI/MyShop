<?php


namespace app\controllers;

use app\models\Brand;
use Yii;
use app\models\Product;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class ProductController extends AppHomeController
{

    public function actionView($id)
    {
        $id = (int)$id;
        $product = Product::findOne($id);

        //404
        if (empty($product)) {
            throw new NotFoundHttpException('Запрашиваемая страница не существует.');
        }
        //404

        //set Meta
        $this->setMeta("{$product->name}", $product->keywords, $product->description);
        //set Meta

        //        pagination productSale
        $productSale = Product::find()
            ->where(['is_sale' => 1])
            ->orderBy('RAND()')
            ->limit(4)
            ->all();

//        $pages = new Pagination(['totalCount' => $query->count(),
//            'pageSize' => 4,
//            'forcePageParam' => false,
//            'pageSizeParam' => false
//        ]);
//        $productSale = $query
//            ->offset($pages->offset)
//            ->limit($pages->limit)
//            ->all();
        //        pagination productSale


        return $this->render('view', compact(
              'product',
                   'productSale',
                     'pages',
                     'productQty',
                     'brands'));
    }

    public function actionSearch()
    {
        $search = trim(Yii::$app->request->get('search'));
        $queryProductsToSearch = (new Product())->getQueryProductsToSearch($search);
        $sort = (new Product())->getSortParameters();
        $pages = (new Product())->getPaginationParameters($queryProductsToSearch);
        $renderProductsToSearch = $queryProductsToSearch
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy($sort->orders)
            ->all();
        //404
        if (empty($search)) {
            return $this->render('search');
        }
        //404

        //set Meta
        $this->setMeta("Поиск: {$search} ");
        //set Meta

        //brands
        $productsBrandBase = Product::find()
            ->where(['like', 'product.name', $search]);
        $productsBrand = (new Product())->getProductsBrandParameters($productsBrandBase);
        //brands

        return $this->render('search', compact(
             'renderProductsToSearch',
                  'productsBrand',
                    'pages',
                    'search',
                    'sort'));
    }

//    public function actionBrandSort($brand_id)
//    {
//        $brand_id = (int)$brand_id;
//        $baseProductsToBrand = (new Product())->getQueryProductsToBrand($brand_id);
//
//        $sort = (new Product())->getSortParameters();
//        $pages = (new Product())->getPaginationParameters($baseProductsToBrand);
//        $renderProductsToBrand = $baseProductsToBrand
//
//            ->offset($pages->offset)
//            ->limit($pages->limit)
//            ->orderBy($sort->orders)
//            ->all();
//
//        //404
//        if (empty($baseProductsToBrand)) {
//            throw new NotFoundHttpException('Запрашиваемая страница не существует.');
//        }
//        //404
//
//        //set Meta
//        $brand = (new Brand())->getBrand($brand_id);
//        $this->setMeta("Instrumental :: {$brand->name}");
//        //set Meta
//
//        return $this->render('sort', compact(
//            'renderProductsToBrand',
//                 'sort',
//                    'pages'
//        ));
//    }
}