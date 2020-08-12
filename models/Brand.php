<?php


namespace app\models;


use yii\db\ActiveRecord;

class Brand extends ActiveRecord
{
    public static function tableName()
    {
        return 'brand';
    }

    public function getProducts()
    {
        return $this->hasMany(Product::class, ['brand_id' => 'id']);
    }

    // Возвращает информацию о бренде с идентификатором $id
    public function getBrand($id)
    {
        $id = (int)$id;
        return Brand::findOne($id);
    }

    public function getNameBrand($brand)
    {
        return Brand::find()
            ->select('id')
            ->where(['name' => $brand])
            ->one();
    }
}