<?php


namespace app\controllers;



use app\models\Brand;
use app\models\Category;
use app\models\Product;
use app\widgets\Alert;
use Yii;
use yii\web\NotFoundHttpException;

class CategoryController extends AppHomeController
{
    private $cache_time = 30;

    public function actionFilter() {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $categoryId = Yii::$app->request->get('categoryId');
        $brandId = Yii::$app->request->get('brandId');
        $rangePrice = Yii::$app->request->get('rangePrice');

        $categoryId = (int)$categoryId;
        $brandId = (int)$brandId;
        $rangePrice = (int)$rangePrice;

        $baseProductsToCategory = (new Product())->getQueryProductsToCategoryToBrand($categoryId, $brandId);
        $pages = (new Product())->getPaginationParameters($baseProductsToCategory);
        $renderProducts = (new Product())->getTestRenderProducts($baseProductsToCategory, $pages);
        if ($brandId && $rangePrice) {
            print_r('есть brandId и rangePrice');

//            $baseProductsToCategory = (new Product())->getQueryProductsToCategoryToBrandToRange($categoryId, $brandId, $rangePrice);
//            $pages = (new Product())->getPaginationParameters($baseProductsToCategory);
//            $renderProducts = (new Product())->getTestRenderProducts($baseProductsToCategory, $pages);
//
        } else if (empty($brandId)) {
            print_r('есть только rangePrice');

//            $baseProductsToCategory = (new Product())->getQueryProductsToCategoryToBrand($categoryId, $brandId);
//            $pages = (new Product())->getPaginationParameters($baseProductsToCategory);
//            $renderProducts = (new Product())->getTestRenderProducts($baseProductsToCategory, $pages);
        } else {
            print_r('есть только brandId');

//            $baseProductsToCategory = (new Product())->getQueryProductsToCategoryToRange($categoryId, $rangePrice);
//            $pages = (new Product())->getPaginationParameters($baseProductsToCategory);
//            $renderProducts = (new Product())->getTestRenderProducts($baseProductsToCategory, $pages);
        }
//        $pages = (new Product())->getPaginationParameters($baseProductsToCategory);
//        $renderProducts = (new Product())->getTestRenderProducts($baseProductsToCategory, $pages);


//        return $this->asJson(['html' => $this->renderPartial('include',
//                                                compact(
//                                                    'renderProducts',
//                                                         'pages'))]);
        return $this->renderPartial('include',
                                                compact(
                                                    'renderProducts',
                                                         'pages'));

//        $renderProducts = Product::find()
//            ->where(['category_id' => $categoryId])
//            ->andWhere(['brand_id' => $brandId])
//            ->all();
//        $baseProductsToCategory = (new Product())->getQueryProductsToCategoryToBrand($category_id, $brandId);
//        $pages = (new Product())->getPaginationParameters($baseProductsToCategory);
//        $data = (new Product())->getRenderProducts($baseProductsToCategory, $pages);
//////                Yii::$app->cache->set('category-' . $category_id . '/' . 'brand-' . $brand_id, $data, $this->cache_time);
//////            }
//        $baseProductsToCategory = $data['0'];
//        $pages = $data['1'];
//        $test = '1';
////        if (\Yii::$app->request->isAjax) {
////        }
    }

    public function actionView($category_id)
    {
        $category_id = (int)$category_id;

            $data = Yii::$app->cache->get('category-' . $category_id);
            if ($data === false) {
                $baseProductsToCategory = (new Product())->getQueryProductsToCategory($category_id);
                $pages = (new Product())->getPaginationParameters($baseProductsToCategory);
                $data = (new Product())->getRenderProducts($baseProductsToCategory, $pages);
                Yii::$app->cache->set('category-' . $category_id, $data, $this->cache_time);
            }
            $renderProducts = $data['0'];
            $pages = $data['1'];

        //404
        if (empty($renderProducts)) {
            throw new NotFoundHttpException('Запрашиваемая страница не существует.');
        }
        //404

        //set Meta
        $category = Yii::$app->cache->get('categoryMeta-' . $category_id);
        if ($category === false) {
            $category = Category::findOne($category_id);
            $this->setMeta("{$category->name}", $category->keywords, $category->description);
            Yii::$app->cache->set('categoryMeta-' . $category_id, $category, $this->cache_time);
        }
        //set Meta

        //brands
        $productsBrand = Yii::$app->cache->get('productsBrandBase-' . $category_id);
        if ($productsBrand === false) {
            $productsBrandBase = Product::find()
                ->where(['product.category_id' => $category_id]);
            $productsBrand = (new Product())->getProductsBrandParameters($productsBrandBase);
            Yii::$app->cache->set('productsBrandBase-' . $category_id, $productsBrand, $this->cache_time);
        }
        //brands

        return $this->render('view', compact(
                          'category',
                               'renderProducts',
                                  'pages',
                                  'productsBrand',
                                  'brandName',
                                  'range',
                                  'brand'
                            ));
    }
}