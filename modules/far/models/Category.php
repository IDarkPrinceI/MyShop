<?php

namespace app\modules\far\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property string|null $description
 * @property string|null $keywords
 */
class Category extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'category';
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'parent_id']);
    }
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['name'], 'required'],
            [['name', 'description', 'keywords'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Родительская категория',
            'name' => 'Название',
            'description' => 'Описание',
            'keywords' => 'Ключевые слова',
        ];
    }
}
