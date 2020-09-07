<?php


namespace app\controllers;


use yii\web\Controller;

class AppHomeController extends Controller
{

    protected function setMeta($title = null, $keywords = null, $description = null) {

        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
    }

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }


}