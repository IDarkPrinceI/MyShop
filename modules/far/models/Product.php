<?php

namespace app\modules\far\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $content
 * @property float $price
 * @property float $old_price
 * @property string|null $description
 * @property string|null $keywords
 * @property string $img
 * @property int $is_sale
 * @property int $is_hit
 * @property int $is_new
 * @property int $brand_id
 */
class Product extends \yii\db\ActiveRecord
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

    public function rules()
    {
        return [
            [['category_id', 'name', 'content', 'brand_id'], 'required'],
            [['category_id', 'is_sale', 'is_hit', 'is_new', 'brand_id'], 'integer'],
            [['content'], 'string'],
            [['price', 'old_price'], 'number'],
            [['name', 'description', 'keywords', 'img'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Категория',
            'name' => 'Название',
            'content' => 'Описание',
            'price' => 'Цена, руб',
            'old_price' => 'Старая цена, руб',
            'description' => 'Контент',
            'keywords' => 'Keywords',
            'img' => 'Изображение',
            'is_sale' => 'Распродажа',
            'is_hit' => 'Хит',
            'is_new' => 'Новинка',
            'brand_id' => 'Бренд',
        ];
    }
}
