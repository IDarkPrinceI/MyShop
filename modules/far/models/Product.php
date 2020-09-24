<?php

namespace app\modules\far\models;

use Yii;

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
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
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

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'name' => 'Name',
            'content' => 'Content',
            'price' => 'Price',
            'old_price' => 'Old Price',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'img' => 'Img',
            'is_sale' => 'Is Sale',
            'is_hit' => 'Is Hit',
            'is_new' => 'Is New',
            'brand_id' => 'Brand ID',
        ];
    }
}
