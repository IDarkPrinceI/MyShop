<?php


namespace app\models;


use yii\data\Pagination;
use yii\data\Sort;
use yii\db\ActiveRecord;

class Category extends ActiveRecord
{

    public static function tableName()
    {
        return 'category';
    }

    public function getProduct() //Правильнее будет Products
    {
        return $this->hasMany(Product::class, ['category_id' => 'id']);
    }

    // Возвращает родительскую категорию
    public function getParent()
    {
        return $this->hasOne(Category::class, ['id' => 'parent_id']);
    }

    //Возвращаем дочерние категории
    public function getChildren()
    {
        return $this->hasMany(Category::class, ['parent_id' => 'id']);
    }

}