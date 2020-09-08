<?php


namespace app\models;


use phpDocumentor\Reflection\Types\Self_;
use Yii;
use yii\data\Pagination;
use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    private $cache_time = 30;

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

    public function getProductToSearch($search, $page)
    {
        $key = 'search-' . md5($search) . '-page-' . $page;

        //getCache
        $data = Yii::$app->cache->get($key);
            if ($data === false) {
                $wordsSearch = explode(' ', $search);
                $queryProductsToSearch = self::find()
                    ->where(['like', 'name', $wordsSearch[0]]);
                for ($i = 1; $i < count($wordsSearch); $i++) {
                    $queryProductsToSearch = $queryProductsToSearch
                        ->andWhere(['like', 'name', $wordsSearch[$i]]);
                }
                $pages = self::getPaginationParameters($queryProductsToSearch);
                $renderProductsToSearch = $queryProductsToSearch
                    ->offset($pages->offset)
                    ->limit($pages->limit)
                    ->orderBy('price')
                    ->all();
                $data = [$renderProductsToSearch, $pages];

                //setCache
                Yii::$app->cache->set($key, $data, $this->cache_time);
            }
            return $data;
    }

    public function cleanSearchString($search)
    {
        // удалить все, кроме букв и цифр
        $search = preg_replace('#[^0-9a-zA-ZА-Яа-яёЁ]#u', ' ', $search);
        // заменить двойные пробелы на одинарные
        $search = preg_replace('#\s+#u', ' ', $search);
        $search = trim($search);
        return $search;
    }

    public function getPaginationParameters($query)
    {
        $paginationParameters = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 6,
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