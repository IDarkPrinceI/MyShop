<?php


namespace app\controllers;


use app\models\Brand;
use app\models\Category;
use app\models\Product;
use Yii;
use yii\data\Pagination;
use yii\data\Sort;
use yii\web\NotFoundHttpException;

class CategoryController extends AppHomeController
{

    public function actionView($category_id)
//        $id = Yii::$app->request->get($id);
    {
        $category_id = (int)$category_id;

        $baseProducts = (new Category())->getProductsToCategory($category_id);
        $sort = (new Product())->getSortParameters();
        $pages = (new Product())->getPaginationParameters($baseProducts);
        $renderProducts = $baseProducts
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy($sort->orders)
            ->all();

        //404
        if (empty($renderProducts)) {
            throw new NotFoundHttpException('Запрашиваемая страница не существует.');
        }
        //404


        //set Meta
        $category = Category::findOne($category_id);
        $this->setMeta("{$category->name}", $category->keywords, $category->description);
        //set Meta

        //test
        $productBrand = Product::find()->where(['category_id' => $category_id])->select('brand_id')->distinct()->all();
        //test

        return $this->render('view', compact(
                          'category',
                               'sort',
                                  'renderProducts',
                                  'pages',
                                  'productBrand'
                            ));
    }



}