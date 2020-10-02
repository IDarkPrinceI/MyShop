<?php

namespace app\modules\far\models;

use Yii;


class Brand extends \yii\db\ActiveRecord
{

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

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'content' => 'Содержание',
            'keywords' => 'Ключевые клова',
            'description' => 'Описание',
            'image' => 'Изображение',
        ];
    }
}
