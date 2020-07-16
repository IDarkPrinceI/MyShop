<?php


namespace app\controllers;



use app\models\Brand;
use app\models\Category;
use app\models\Product;
use Yii;
use yii\web\NotFoundHttpException;

class CategoryController extends AppHomeController
{
    public function actionView($category_id, $brand_id = null)

//        $id = Yii::$app->request->get($id);
    {
        $category_id = (int)$category_id;
        $range = Yii::$app->request->get('range');

        if( isset($range) )
        {
            $range = (int)$range;
            $baseProductsToCategory = (new Product())->getQueryProductsToCategoryToRange($category_id, $range);
            $pages = (new Product())->getPaginationParameters($baseProductsToCategory);
            $renderProducts = $baseProductsToCategory
                ->offset($pages->offset)
                ->limit($pages->limit)
                ->orderBy(['name' => SORT_ASC])
                ->all();

        }elseif( isset($brand_id) ) {
            $brand_id =(int)$brand_id;
            $baseProductsToCategory = (new Product())->getQueryProductsToCategoryToBrand($category_id, $brand_id);
            $sort = (new Product())->getSortParameters();
            $pages = (new Product())->getPaginationParameters($baseProductsToCategory);
            $renderProducts = $baseProductsToCategory
                ->offset($pages->offset)
                ->limit($pages->limit)
                ->orderBy($sort->orders)
                ->all();

        }else{
            $data = Yii::$app->cache->get('category-' . $category_id);
            if ($data === false) {
                $baseProductsToCategory = (new Product())->getQueryProductsToCategory($category_id);
                $sort = (new Product())->getSortParameters();
                $pages = (new Product())->getPaginationParameters($baseProductsToCategory);
                $renderProducts = $baseProductsToCategory
                    ->offset($pages->offset)
                    ->limit($pages->limit)
                    ->orderBy($sort->orders)
                    ->all();
                $data = [$renderProducts, $pages, $sort];
                Yii::$app->cache->set('category-' . $category_id, $data);
            }
//            debug($data);
            list($renderProducts, $pages, $sort) = $data;
        }

        //404
        if (empty($renderProducts)) {
            throw new NotFoundHttpException('Запрашиваемая страница не существует.');
        }
        //404

        //set Meta
        $category = Category::findOne($category_id);
        $this->setMeta("{$category->name}", $category->keywords, $category->description);
        //set Meta

        //brands
        $productsBrandBase = Product::find()
            ->where(['product.category_id' => $category_id]);
        $productsBrand = (new Product())->getProductsBrandParameters($productsBrandBase);
        //brands

        //brand
        $brandName = (new Brand())->getBrand($brand_id);
        //brand

        return $this->render('view', compact(
                          'category',
                               'sort',
                                  'renderProducts',
                                  'pages',
                                  'productsBrand',
                                  'brandName',
                                  'range'
                            ));
    }
}