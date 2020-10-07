<?php


namespace app\assets;


use yii\web\AssetBundle;

class StatisticAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css',
        'adminlte/bower_components/font-awesome/css/font-awesome.min.css',
        'adminlte/bower_components/Ionicons/css/ionicons.min.css',
        'adminlte/dist/css/AdminLTE.min.css',
        'adminlte/dist/css/skins/skin-blue.min.css',
        '//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic',
        '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css' //календарь

    ];
    public $js = [
        '//code.jquery.com/jquery-1.12.4.js', //календарь
        '//code.jquery.com/ui/1.12.1/jquery-ui.js', //календарь
        'adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js',
        'adminlte/dist/js/adminlte.min.js',
        'js/far.js'

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}