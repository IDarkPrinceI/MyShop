<?php


namespace app\controllers;



use app\models\Brand;
use app\models\Category;
use app\models\Product;
use Yii;
use yii\web\NotFoundHttpException;

class CategoryController extends AppHomeController
{
    private $cache_time = 3600;

    public function actionFilter() {
//        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $brandId = Yii::$app->request->get('brandId');
        $category_id = Yii::$app->request->get('categoryId');

        $renderProducts = Product::find()
            ->where(['category_id' => $category_id])
            ->andWhere(['brand_id' => $brandId])
            ->all();
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
        return $this->asJson(['html' => $this->renderPartial('include', compact('renderProducts'))]);
    }

    public function actionView($category_id, $brand = null, $brand_id = null)
    {
        $brand = Yii::$app->request->get('brand');
//        debug($selectBrand);
//        echo ( $_GET['brand'] );
//        print_r($selectBrand);
//        console.log($selectBrand);
//        if($selectBrand) {
//            debug($selectBrand);
//        }
        $category_id = (int)$category_id;
        $range = Yii::$app->request->get('range');
        $cache_time = 3600;

        if( isset($range) )
        {
//            $data = Yii::$app->cache->get('category-' . $category_id . '/' . 'range-' . $range);
//            if ($data === false) {
                $range = (int)$range;
                $baseProductsToCategory = (new Product())->getQueryProductsToCategoryToRange($category_id, $range);
                $pages = (new Product())->getPaginationParameters($baseProductsToCategory);
                $data = (new Product())->getRenderProducts($baseProductsToCategory, $pages);
//                Yii::$app->cache->set('category-' . $category_id . '/' . 'range-' . $brand_id, $data, $this->cache_time);
//            }
            $renderProducts = $data['0'];
            $pages = $data['1'];

        }elseif( isset($brand_id) ) {
//            $data = Yii::$app->cache->get('category-' . $category_id . '/' . 'brand-' . $brand_id);
//            if ($data === false) {
                $brand_id = (int)$brand_id;
                $baseProductsToCategory = (new Product())->getQueryProductsToCategoryToBrand($category_id, $brand_id);
                $pages = (new Product())->getPaginationParameters($baseProductsToCategory);
                $data = (new Product())->getRenderProducts($baseProductsToCategory, $pages);
//                Yii::$app->cache->set('category-' . $category_id . '/' . 'brand-' . $brand_id, $data, $this->cache_time);
//            }
            $renderProducts = $data['0'];
            $pages = $data['1'];

        }else{
//            $data = Yii::$app->cache->get('category-' . $category_id);
//            if ($data === false) {
                $baseProductsToCategory = (new Product())->getQueryProductsToCategory($category_id);
                $pages = (new Product())->getPaginationParameters($baseProductsToCategory);
                $data = (new Product())->getRenderProducts($baseProductsToCategory, $pages);
//                Yii::$app->cache->set('category-' . $category_id, $data, $this->cache_time);
//            }
            $renderProducts = $data['0'];
            $pages = $data['1'];
        }

        //404
        if (empty($renderProducts)) {
            throw new NotFoundHttpException('Запрашиваемая страница не существует.');
        }
        //404

        //set Meta
//        $category = Yii::$app->cache->get('categoryMeta-' . $category_id);
//        if ($category === false) {
            $category = Category::findOne($category_id);
            $this->setMeta("{$category->name}", $category->keywords, $category->description);
//            Yii::$app->cache->set('categoryMeta-' . $category_id, $category, $this->cache_time);
//        }
        //set Meta

        //brands
//        $productsBrand = Yii::$app->cache->get('productsBrandBase-' . $category_id);
//        if ($productsBrand === false) {
            $productsBrandBase = Product::find()
                ->where(['product.category_id' => $category_id]);
            $productsBrand = (new Product())->getProductsBrandParameters($productsBrandBase);
//            Yii::$app->cache->set('productsBrandBase-' . $category_id, $productsBrand, $this->cache_time);
//        }
        //brands

        //brand
//        $brandName = Yii::$app->cache->get('brandName-' . $brand_id);
//        if ($brandName === false) {
            $brandName = (new Brand())->getBrand($brand_id);
//            Yii::$app->cache->set('brandName-' . $brand_id, $brandName, $this->cache_time);
//        }
        //brand
//        if (Yii::$app->request->isAjax) {
//            return $this->redirect(\Yii::$app->request->referrer);
//        }
//            return $this->renderPartial('view', compact('category',
//                'renderProducts',
//                'pages',
//                'productsBrand',
//                'brandName',
//                'range'));
//        }

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