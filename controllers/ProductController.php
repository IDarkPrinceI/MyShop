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
        $query = Product::find()->where(['is_sale' => 1]);
        $pages = new Pagination(['totalCount' => $query->count(),
            'pageSize' => 4,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $productSale = $query->offset($pages->offset)->limit($pages->limit)->all();
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
//        $productsBrand = $queryProductsToSearch
//            ->with('brand')
//            ->select('brand_id')
//            ->joinWith('brand')
//            ->leftJoin('brand', '`brand`.`id` = `product`.`brand_id`')
//            ->innerJoin(Brand::tableName(),'brand_id = brand.id'
//                'brand',
//                'brand.id = product.brand_id'
//                'id = brand_id'
//                'brand_id = id'

//            ->distinct()

//            ->asArray()
//            ->indexBy('brand_id')
//            ->all();
//        return Comments::find()
//            ->innerJoin(Books::tableName(),'model_id = books.id')
//            ->where(['books.user_id'=>Yii::$app->user->identity->id])
//            ->all();
        $new = Product::find()
            ->where([
                'like', 'name', $search
            ])
            ->with('brand')
            ->all();

        debug($new);


        //set Meta
        $this->setMeta("Поиск: {$search} ");
        //set Meta

        //404
        if (empty($search)) {
            return $this->render('search');
        }
        //404

        return $this->render('search', compact(
             'renderProductsToSearch',
                  'productsBrand',
                    'pages',
                    'search',
                    'sort'));
    }

    public function actionBrandSort($brand_id)
    {
        $brand_id = (int)$brand_id;
        $baseProductsToBrand = (new Product())->getQueryProductsToBrand($brand_id);

        $sort = (new Product())->getSortParameters();
        $pages = (new Product())->getPaginationParameters($baseProductsToBrand);
        $renderProductsToBrand = $baseProductsToBrand

            ->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy($sort->orders)
//            ->with('brand')
//            ->indexBy('name')
            ->all();
//        debug($renderProductsToBrand);

        //404
        if (empty($baseProductsToBrand)) {
            throw new NotFoundHttpException('Запрашиваемая страница не существует.');
        }
        //404

        //set Meta
        $brand = (new Brand())->getBrand($brand_id);
        $this->setMeta("Instrumental :: {$brand->name}");
        //set Meta

        return $this->render('sort', compact(
            'renderProductsToBrand',
                 'sort',
                    'pages'
        ));
    }
}