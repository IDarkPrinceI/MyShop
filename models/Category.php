<?php


namespace app\models;


use yii\db\ActiveRecord;

class Category extends ActiveRecord
{

    public static function tableName()
    {
        return 'category';
    }

    public function getProduct()
    {
        return $this->hasMany(Product::class, ['category_id' => 'id']);
    }

}