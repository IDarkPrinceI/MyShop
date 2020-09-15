<?php


namespace app\controllers;


use yii\web\Controller;
use yii\web\HttpException;

class AppHomeController extends Controller
{
    public function beforeAction($action)
    {
//        debug($action);
        $guestPossibleActions = ['login',
            'index',
            'search',
            'add',
            'show',
            'clear',
            'del-item',
            'clear',
            'checkout',
            'change-cart'];
        $userPossibleActions = ['profile',
            'logout'];

        if (\Yii::$app->user->identity['role'] === 'admin') {
            return true;
        } elseif (\Yii::$app->user->isGuest) {
            if(in_array($action->id, $guestPossibleActions)) {
                return true;
            }
            return $this->redirect('login');

        } else
            $possibleActions = array_merge($guestPossibleActions, $userPossibleActions);
            if(in_array($action->id, $possibleActions)) {
                return true;
            }
            return $this->redirect('login');
    }

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