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


    public function init()
    {
        parent::init();
//        if ($this->ul_class === null) {
//            $this->ul_class = 'dropDown';
//        }
        if ($this->tpl === null) {
            $this->tpl = 'dropDown';
        }
        $this->tpl .= '.php';
    }


    public function run()
    {
        $this->data = Category::find()->select('id, parent_id, name')
            ->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);
//        debug($this->data);
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

    protected function getMenuHtml($tree)
    {
            $str = '';
            foreach ($tree as $category) {
                $str .= $this->catToTemplate($category);
            }
            return $str;
    }

    protected function catToTemplate($category)
    {
            ob_start();
            include __DIR__ . '/tpl/' . $this->tpl;
            return ob_get_clean();
    }
}