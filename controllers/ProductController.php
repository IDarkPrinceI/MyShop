<?php


namespace app\controllers;

use Yii;
use app\models\Product;
use yii\web\NotFoundHttpException;

class ProductController extends AppHomeController
{
    private $cache_time = 3600;

    public function actionView($id)
    {
        $id = (int)$id;
        $product = Yii::$app->cache->get('$product-' . $id);
        if($product === false) {
            $product = Product::findOne($id);
            Yii::$app->cache->set('$product-' . $id, $product, $this->cache_time);
        }


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
                   'productSale'));
    }

    public function actionSearch()
    {

        $search = trim(Yii::$app->request->get('search'));
        $queryProductsToSearch = (new Product())->getQueryProductsToSearch($search);
        $pages = (new Product())->getPaginationParameters($queryProductsToSearch);
        $renderProductsToSearch = $queryProductsToSearch
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy('price')
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
//        $productsBrandBase = Product::find()
//            ->where(['like', 'product.name', $search]);
//        $productsBrand = (new Product())->getProductsBrandParameters($productsBrandBase);
        //brands

        return $this->render('search', compact(
             'renderProductsToSearch',
//                  'productsBrand',
                    'pages',
                    'search'));
    }

    public function actionShow()
    {
        $id =\Yii::$app->request->get('id');
        $modalProduct = Yii::$app->cache->get('modalProduct-' . $id);
        if ($modalProduct === false) {
            $modalProduct = (new Product())->getProduct($id);
            Yii::$app->cache->set('modalProduct-' . $id, $modalProduct, $this->cache_time);
        }

        return $this->renderPartial('product-modal', compact(
                                 'modalProduct'
        ));
    }
}