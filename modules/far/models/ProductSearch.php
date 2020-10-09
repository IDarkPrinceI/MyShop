<?php

namespace app\modules\far\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\far\models\Product;

/**
 * ProductSearch represents the model behind the search form of `app\modules\far\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'is_sale', 'is_hit', 'is_new', 'brand_id'], 'integer'],
            [['name', 'content', 'description', 'keywords', 'img'], 'safe'],
            [['price', 'old_price'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Product::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'category_id' => SORT_ASC
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->category_id,
            'price' => $this->price,
            'old_price' => $this->old_price,
            'is_sale' => $this->is_sale,
            'is_hit' => $this->is_hit,
            'is_new' => $this->is_new,
            'brand_id' => $this->brand_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'img', $this->img]);

        return $dataProvider;
    }
}
