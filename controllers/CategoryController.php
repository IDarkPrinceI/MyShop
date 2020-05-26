<?php


namespace app\controllers;


use app\models\Category;
use app\models\Product;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class CategoryController extends AppHomeController
{

    public function actionView($id)
    {
        //404
        $category = Category::findOne($id);
        if (empty($category)) {
            throw new NotFoundHttpException('Запрашиваемая страница не существует.');
        }
        //404

        //set Meta
//        $this->setMeta("{$category->title} :: " . \Yii::$app->name, $category->keywords, $category->description);
        //set Meta

        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(),
            'pageSize' => 4,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        //pagination product

        return $this->render('view', compact('products', 'pages'));
    }
}