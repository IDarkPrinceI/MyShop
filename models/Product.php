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

    public function getQueryProductsToCategory($category_id)
    {
       $query = Product::find()
           ->where([
               'category_id' => $category_id
           ]);
       return $query;
    }

    public function getQueryProductsToBrand($brand_id)
    {
        $query = Product::find()
            ->where([
                'brand_id' => $brand_id
            ]);
//            ->with('brand')
//            ->all();
//            ->innerJoin(
//                'brand',
////                'brand_id = id'
//                'brand.id = product.brand_id'
//            );
        return $query;
    }

    public function getQueryProductsToSearch($search)
    {
        $query = Product::find()
            ->where([
                'like', 'name', $search
            ]);
        return $query;
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
    public function getProductsBrand($id)
    {
        $productsBrand = Product::find()
            ->where(['category_id' => $id])
            ->select('brand_id')
            ->distinct()
            ->all();
        ksort($productsBrand);
        return $productsBrand;
    }
}