<?php

namespace app\modules\far\models;

use Yii;

/**
 * This is the model class for table "brand".
 *
 * @property int $id Уникальный идентификатор
 * @property string $name Наименование
 * @property string|null $content Краткое описание
 * @property string|null $keywords Мета-тег keywords
 * @property string|null $description Мета-тег description
 * @property string|null $image Имя файла изображения
 */
class Brand extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'brand';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'content', 'keywords', 'description', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'content' => 'Content',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'image' => 'Image',
        ];
    }
}
