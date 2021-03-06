<?php


namespace app\assets;


use yii\web\AssetBundle;

class AppHomeAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/bootstrap.css',
        'css/style.css',
        'css/font-awesome.css',
        'css/jstarbox.css',
        'css/coreSlider.css',
        '//fonts.googleapis.com/css?family=Cagliostro',
        '//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300',
    ];
    public $js = [
        'https://api-maps.yandex.ru/2.1/?apikey=8a3ecadb-e4ca-48eb-9d4e-cbc2af213efb&lang=ru-RU',
//        'js/bootstrap.min.js',
//        search jQuery
        'js/jquery-ui.js',
        'js/responsiveslides.min.js',
//        cart
        'js/simpleCart.min.js',
//        рейтинг на основной странице
        'js/jstarbox.js',
//        основной слайдер
        'js/coreSlider.js',
        'js/main.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

}


