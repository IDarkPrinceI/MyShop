<?php


namespace app\controllers;

use app\models\Brand;
use app\models\Category;
use Yii;
use app\models\Product;
use yii\data\Pagination;
use yii\data\Sort;
use yii\web\NotFoundHttpException;

class ProductController extends AppHomeController
{

    public function actionView($id)
    {
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

        //getbrands
        $brands = (new Brand())->getBrands();
        //getbrands

        return $this->render('view', compact(
                          'product',
                                'productSale',
                                   'pages',
                                   'productQty',
                                   'brands'));
    }


    public function actionSearch()
    {
        //sort
        $sort = new Sort([
            'attributes' => [
                'price' => [
                    'label' => 'Цена'
                ],
                'name' => [
                    'asc' => ['name' => SORT_ASC],
                    'desc' => ['name' => SORT_DESC],
                    'default' => SORT_ASC,
                    'label' => 'Название',
                ]
            ]
        ]);
        //sort

        $search = trim(Yii::$app->request->get('search'));

        //set Meta
        $this->setMeta("Поиск: {$search} ");
        //set Meta

        //404
        if (empty($search)) {
            return $this->render('search');
        }
        //404

        //pagination search
        $query = Product::find()->where(['like', 'name', $search]);
        $pages = new Pagination(['totalCount' => $query->count(),
            'pageSize' => 3,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $searchProducts = $query
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy($sort->orders)
            ->all();
        //pagination search

        return $this->render('search',
            compact(
                'searchProducts',
                     'pages',
                        'search',
                        'sort'));
    }

    public function actionBrandSort($brand_id)
    {

        $brand_id = (int)$brand_id;
        $productsToBrand = (new Product())->getProductsToBrand($brand_id);
        $sort = (new Product())->getSortParameters();
        $pages = (new Product())->getPaginationParameters($productsToBrand);
        $productsToBrand = $productsToBrand
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy($sort->orders)
            ->all();

        //404
        if (empty($productsToBrand)) {
            throw new NotFoundHttpException('Запрашиваемая страница не существует.');
        }
        //404

        //set Meta
        $brand = (new Brand())->getBrand($brand_id);
        $this->setMeta("Instrumental :: {$brand->name}");
        //set Meta

        return $this->render('sort', compact(
            'productsToBrand',
                 'sort',
                    'pages'
        ));
    }
}