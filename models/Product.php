<?php


namespace app\models;


use yii\data\Pagination;
use yii\data\Sort;
use yii\db\ActiveRecord;

class Product extends ActiveRecord
{

    public static function tableName()
    {
        return 'product';
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public function getBrand()
    {
        return $this->hasOne(Brand::class, ['brand_id' => 'id']);
    }

    public function getQueryParameters($id)
    {
        $queryParameters = Product::find()
            ->where([
                'brand_id' => $id
            ]);
        return $queryParameters;
    }

    // Возвращает массив товаров нужного бренда
    public function getProductsToBrand($id)
    {
        $query = $this->getQueryParameters($id);
        $sort = $this->getSortParameters();
        $pages = $this->getPaginationParameters($query);
        $brandProducts = $query
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy($sort->orders)
            ->all();
        return $brandProducts;
    }

    public function getSortParameters()
    {
        $sortParameters = new Sort([
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
        return $sortParameters;
    }

    public function getPaginationParameters($query)
    {
        $paginationParameters = new Pagination(['totalCount' => $query->count(),
            'pageSize' => 3,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        return $paginationParameters;
    }
}