<?php


namespace app\components;

use app\models\Category;
use yii\base\Widget;

class DropDownWidget extends Widget
{

    public $ul_class;
    public $tpl;
    public $data;
    public $tree;
    public $menuHtml;
    public $cache_time = 5;

    public $model; //для category выпадающего списка

    public function init()
    {
        parent::init();

        if ($this->tpl === null) {
            $this->tpl = 'dropDown';
        }
        $this->tpl .= '.php';
    }


    public function run()
    {
//        get cache
        if($this->cache_time) {
            $menu = \Yii::$app->cache->get($this->tpl);
            if($menu) {
                return $menu;
            }
        }
        $this->data = Category::find()->select('id, parent_id, name')
            ->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);

        //set cache
        if($this->cache_time) {
            \Yii::$app->cache->set($this->tpl, $this->menuHtml, $this->cache_time);
        }
        return $this->menuHtml;
    }

    protected function getTree()
    {
        $tree = [];
        foreach ($this->data as $id => &$node) {
            if (!$node['parent_id'])
                $tree[$id] = &$node;
            else
                $this->data[$node['parent_id']]['children'][$node['id']] = &$node;
        }
        return $tree;
    }

    protected function getMenuHtml($tree, $tab = '')
    {

        foreach ($tree as $category) {
            $str .= $this->catToTemplate($category, $tab);
        }
        return $str;
    }

    protected function catToTemplate($category, $tab)
    {
        ob_start();
        include __DIR__ . '/tpl/' . $this->tpl;
        return ob_get_clean();
    }

}