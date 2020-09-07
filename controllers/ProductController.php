<?php


namespace app\controllers;

use Yii;
use app\models\Product;
use yii\web\HttpException;

class ProductController extends AppHomeController
{
    private $cache_time = 30;

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
            throw new HttpException(404,'Запрашиваемый продукт не существует.');
        }
        //404

        //set Meta
        $this->setMeta("{$product->name}", $product->keywords, $product->description);
        //set Meta

        //productSale
        $productSale = Product::find()
            ->where(['is_sale' => 1])
            ->orderBy('RAND()')
            ->limit(4)
            ->all();

        //productSale

        return $this->render('view', compact(
              'product',
                   'productSale'));
    }

    public function actionSearch($page = 1)
    {
        $search = trim(Yii::$app->request->get('search'));

        //404
        if (empty($search)) {
            return $this->render('search');
        }
        //404
        $key = 'search-' . md5($search) . '-page-' . $page;

        //getCache
        $data = Yii::$app->cache->get($key);
            if ($data === false) {
                $queryProductsToSearch = (new Product())->getQueryProductsToSearch($search);
                $pages = (new Product())->getPaginationParameters($queryProductsToSearch);
                $renderProductsToSearch = $queryProductsToSearch
                    ->offset($pages->offset)
                    ->limit($pages->limit)
                    ->orderBy('price')
                    ->all();
                $data = [$renderProductsToSearch, $pages];
                //setCache
                Yii::$app->cache->set($key, $data, $this->cache_time);
            }
        $renderProductsToSearch = $data[0];
        $pages = $data[1];

        //set Meta
        $this->setMeta("Поиск: {$search} ");
        //set Meta

        return $this->render('search', compact(
             'renderProductsToSearch',
                    'pages',
                    'search'));
    }

    public function actionShow()
    {
        $id =\Yii::$app->request->get('id');
//        $modalProduct = Yii::$app->cache->get('modalProduct-' . $id);
//        if ($modalProduct === false) {
            $modalProduct = (new Product())->getProduct($id);
//            Yii::$app->cache->set('modalProduct-' . $id, $modalProduct, $this->cache_time);
//        }
        return $this->renderPartial('product-modal', compact(
                                 'modalProduct'
        ));
    }
}