<?php


namespace app\assets;


use yii\web\AssetBundle;
use yii\web\View;

class OldIeAsset extends AssetBundle
{
    //Подключение js-файлов для старых версий MS IE
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'js/html5shiv.js',
        'js/respond.min.js',
    ];
    public $jsOptions = [
        // скрипты будут подключены по условию [if lte IE 9]...[endif]
        'condition' => 'lte IE 9',
        // скрипты будут подключены в <head>-секции документа
        'position' => View::POS_HEAD,
    ];
}