<?php


namespace app\controllers;


use app\models\Category;
use app\models\Product;
use Yii;
use yii\data\Pagination;
use yii\data\Sort;
use yii\web\NotFoundHttpException;

class CategoryController extends AppHomeController
{

    public function actionView($id)
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

        $products = Product::find()
            ->where(['category_id' => $id])
            ->orderBy($sort->orders);

        //404
        $category = Category::findOne($id);
        if (empty($category)) {
            throw new NotFoundHttpException('Запрашиваемая страница не существует.');
        }
        //404

        //set Meta
        $this->setMeta("{$category->name}", $category->keywords, $category->description);
        //set Meta

        //pagination product
        $pages = new Pagination(['totalCount' => $products->count(),
            'pageSize' => 3,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $renderProducts = $products
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        //pagination product

//        return $this->render('view', compact('category','products', 'pages', 'sort'));
//        return $this->render('view', ['models' => $category, 'sort' => $sort]);
        return $this->render('view', compact(   'catergory','sort', 'renderProducts', 'pages'));
    }

}