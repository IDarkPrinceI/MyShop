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

        $category = Product::find()
            ->where(['category_id' => $id])
            ->orderBy($sort->orders)
            ->all();

        //404
//        $category = Category::findOne($id);
        if (empty($category)) {
            throw new NotFoundHttpException('Запрашиваемая страница не существует.');
        }
        //404

        //set Meta
//        $this->setMeta("{$category->name}", $category->keywords, $category->description);
        //set Meta

        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(),
            'pageSize' => 4,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        //pagination product

//        return $this->render('view', compact('category','products', 'pages', 'sort'));
//        return $this->render('view', ['models' => $category, 'sort' => $sort]);
        return $this->render('view', compact( 'category',  'sort'));
    }

}