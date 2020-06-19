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
        return $this->hasOne(Brand::class, ['id' => 'brand_id']);
    }

    public function getQuery()
    {
        $baseQuery = Product::find();
        return $baseQuery;
    }

    public function getQueryProductsParameters($id, $baseQuery)
    {
        $queryParameters = $baseQuery
            ->where([
                'category_id' => $id
            ]);
        return $queryParameters;
    }
    public function getQueryParameters($id, $baseProductsToBrandQuery)
    {
        $queryParameters = $baseProductsToBrandQuery
            ->where([
                'brand_id' => $id
            ]);
        return $queryParameters;
    }

    // Возвращает массив товаров нужного бренда
    public function getProductsToBrand($id)
    {
        $baseProductsToBrandQuery = $this->getQuery();
                                    $this->getQueryParameters($id, $baseProductsToBrandQuery);
        return $baseProductsToBrandQuery;
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
            'pageSize' => 9,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        return $paginationParameters;
    }
}