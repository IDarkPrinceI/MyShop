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

        //set Meta
        $this->setMeta("{$product->name}", $product->keywords, $product->description);

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
        $baseSearch = (Yii::$app->request->get('search'));
        $search = (new Product())->cleanSearchString($baseSearch);

        //404
        if (empty($search)) {
            return $this->render('search');
        }
        //404
        $data = (new Product())->getProductToSearch($search, $page);
        $renderProductsToSearch = $data[0];
        $pages = $data[1];

        //set Meta
        $this->setMeta("Поиск: {$search} ");

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