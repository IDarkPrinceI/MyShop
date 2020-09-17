<?php


namespace app\models;


use phpDocumentor\Reflection\Types\Self_;
use Yii;
use yii\data\Pagination;
use yii\db\ActiveRecord;
use yii\db\Query;

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

    public function getProductToSearch($baseSearch, $page)
    {
        $wordsSearch = self::cleanSearchString($baseSearch);
        if (!$wordsSearch) {
            return null;
        }
        $key = 'search-' . md5($baseSearch) . '-page-' . $page;

        //getCache
        $data = Yii::$app->cache->get($key);
        if ($data === false) {


            $count = count($wordsSearch);

            //значения каждого отдельного слова в названии для расчета релевантности
            $separateWordName = round((20/$count), 2);

            //Задаем параметры релевантности
            //Условия для полного запроса в названии
            $relevance = "IF (`name` LIKE '%" . $baseSearch . "%', 60, 0)";
            //Условия для каждого из слов запроса в названии
            foreach ($wordsSearch as $word) {
                $relevance .= " + IF (`name` LIKE '%" . $word . "%', ".$separateWordName.", 0)";
            }
        }
        $query = Product::find()
            ->select(['*', 'relevance' => $relevance])

            // сортируем разультаты по убыванию релевантности
            ->orderBy(['relevance' => SORT_DESC])
            ->where(['like', 'name', $baseSearch])
            ->orWhere(['like', 'name', $wordsSearch[0]]);
        for ($i = 1; $i < $count; $i++) {
            $query = $query->orWhere(['like', 'name', $wordsSearch[$i]]);
        }
        $pages = self::getPaginationParameters($query);

        $renderProductsToSearch = $query
             ->offset($pages->offset)
             ->limit($pages->limit)
             ->all();
        $data = [$renderProductsToSearch, $pages, $baseSearch];
//      //setCache
        Yii::$app->cache->set($key, $data, $this->cache_time);
        return $data;
    }

    public function cleanSearchString($baseSearch)
    {
        // удалить все, кроме букв и цифр
        $search = preg_replace('#[^0-9a-zA-ZА-Яа-яёЁ]#u', ' ', $baseSearch);
        // заменить двойные пробелы на одинарные
        $search = preg_replace('#\s+#u', ' ', $search);
        $search = trim($search);
        //Разделяем поисковый запрос на отдельные слова
        $baseWordsSearch = explode(' ', $search);
        $wordsSearch = [];
        foreach ($baseWordsSearch as $word) {
            if (preg_match('/[zA-ZА]/i', $word)) {
                if (strlen($word) > 3) {
                    if (strlen($word) > 7) {
                        $word = substr($word, 0, (strlen($word) - 2));
                        array_push($wordsSearch, $word);
                    } elseif (strlen($word) > 5) {
                        $word = substr($word, 0, (strlen($word) - 1));
                        array_push($wordsSearch, $word);
                    } else {
                        array_push($wordsSearch, $word);
                    }
                }
                if (empty($wordsSearch)) {
                    return null;
                }
                return $wordsSearch;
            }
            if (strlen($word) > 6) {
                if (strlen($word) > 14) {
                    $word = substr($word, 0, (strlen($word) - 4));
                    array_push($wordsSearch, $word);
                } elseif (strlen($word) > 10) {
                    $word = substr($word, 0, (strlen($word) - 2));
                    array_push($wordsSearch, $word);
                } else {
                    array_push($wordsSearch, $word);
                }
            }
            if (empty($wordsSearch)) {
                return null;
            }
        }
        return $wordsSearch;
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

    public function getFilterRenderProducts($baseProductsToCategory)
    {
        $renderProducts = $baseProductsToCategory
            ->orderBy('price')
            ->all();
        return $renderProducts;
    }
}