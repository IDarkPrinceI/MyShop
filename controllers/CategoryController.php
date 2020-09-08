<?php


namespace app\controllers;



use app\models\Brand;
use app\models\Category;
use app\models\Product;
use app\widgets\Alert;
use Yii;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;

class CategoryController extends AppHomeController
{
    private $cache_time = 30;

    public function actionFilter() {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $categoryId = Yii::$app->request->get('categoryId');
        $brandId = Yii::$app->request->get('brandId');
        $rangePrice = trim(Yii::$app->request->get('rangePrice'));

        $categoryId = (int)$categoryId;
        $brandId = (int)$brandId;
        $rangePrice = (int)$rangePrice;

        if ($brandId && $rangePrice) {
//            print_r('Есть оба параметра');
            $baseProductsToCategory = (new Product())->getQueryProductsToCategoryToBrandToRange($categoryId, $brandId, $rangePrice);
//            $pages = (new Product())->getPaginationParameters($baseProductsToCategory);

        } elseif (empty($brandId) && $rangePrice) {
//            print_r('Есть только цена');
            $baseProductsToCategory = (new Product())->getQueryProductsToCategoryToRange($categoryId, $rangePrice);
//            $pages = (new Product())->getPaginationParameters($baseProductsToCategory);
        } else {
//            print_r('Есть только бренд');
            $baseProductsToCategory = (new Product())->getQueryProductsToCategoryToBrand($categoryId, $brandId);
//            $pages = (new Product())->getPaginationParameters($baseProductsToCategory);
        }
//        $pages = (new Product())->getPaginationParameters($baseProductsToCategory);
        $renderProducts = (new Product())->getFilterRenderProducts($baseProductsToCategory, $pages);

        return $this->renderPartial('include', compact(
                                 'renderProducts'
//                                      'pages'
        ));
    }

    public function actionView($category_id, $page = 1)
    {
        $category_id = (int)$category_id;
        $key = 'category-' . $category_id . '-page-' . $page;

        //getCache
        $data = Yii::$app->cache->get($key);
            if ($data === false) {
                $baseProductsToCategory = (new Product())->getQueryProductsToCategory($category_id);
                $pages = (new Product())->getPaginationParameters($baseProductsToCategory);
                $data = (new Product())->getRenderProducts($baseProductsToCategory, $pages);
                Yii::$app->cache->set($key, $data, $this->cache_time);
            }
            $renderProducts = $data['0'];
            $pages = $data['1'];

        //404
        if (empty($renderProducts)) {
            throw new HttpException(
                404,
                'Запрашиваемая категория не существует'
            );
        }
        //404

        //setCacheMeta
        $category = Yii::$app->cache->get('categoryMeta-' . $category_id);
        if ($category === false) {
            $category = Category::findOne($category_id);
            $this->setMeta("{$category->name}", $category->keywords, $category->description);
            Yii::$app->cache->set('categoryMeta-' . $category_id, $category, $this->cache_time);
        }

        //brands
        $productsBrand = Yii::$app->cache->get('productsBrandBase-' . $category_id);
        if ($productsBrand === false) {
            $productsBrandBase = Product::find()
                ->where(['product.category_id' => $category_id]);
            $productsBrand = (new Product())->getProductsBrandParameters($productsBrandBase);
            Yii::$app->cache->set('productsBrandBase-' . $category_id, $productsBrand, $this->cache_time);
        }

        return $this->render('view', compact(
                          'category',
                               'renderProducts',
                                  'pages',
                                  'productsBrand'
                            ));
    }
}