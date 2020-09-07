<?php


namespace app\models;


use yii\data\Pagination;
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

    public function getQueryProductsToCategory($categoryId)
    {
       $query = Product::find()
           ->where([
               'category_id' => $categoryId
           ]);
       return $query;
    }
//test

//test
    public function getQueryProductsToCategoryToBrand($categoryId, $brandId)
    {
        $query = Product::find()
            ->where(['category_id' => $categoryId])
            ->andWhere(['brand_id' => $brandId]);
        return $query;
    }

    public function getQueryProductsToCategoryToRange($categoryId, $rangePrice)
    {
        $query = Product::find()
            ->where(['category_id' => $categoryId])
            ->andWhere(['<=', 'price', $rangePrice]);
        return $query;
    }

    public function getQueryProductsToCategoryToBrandToRange($categoryId, $brandId, $rangePrice)
    {
        $query = Product::find()
            ->where(['category_id' => $categoryId])
            ->andWhere(['brand_id' => $brandId])
            ->andWhere(['<=', 'price', $rangePrice]);
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

    public function getPaginationParameters($query)
    {
        $paginationParameters = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 9,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        return $paginationParameters;
    }
    public function getProductsBrandParameters($productsBrandBase)
    {
        $productsBrand = $productsBrandBase
        ->asArray()
        ->joinWith('brand')
        ->select([Brand::tableName() . '.name'])
        ->addselect([Brand::tableName() . '.id'])
        ->distinct()
        ->orderBy('name')
        ->all();
        return $productsBrand;
    }

    public function getProduct($id)
    {
        $product = Product::findone($id);
        return $product;
    }

    public function getRenderProducts($baseProductsToCategory, $pages)
    {
        $renderProducts = $baseProductsToCategory
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy('price')
            ->all();
        $data = [$renderProducts, $pages];
        return $data;
    }

    public function getFilterRenderProducts($baseProductsToCategory, $pages)
    {
        $renderProducts = $baseProductsToCategory
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy('price')
            ->all();
        return $renderProducts;
    }
}