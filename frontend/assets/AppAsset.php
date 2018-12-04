<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'bootstrap3/css/bootstrap.css',
        'bootstrap3/css/bootstrap.min.css',
        'bootstrap3/css/bootstrap-theme.css',
        'bootstrap3/css/bootstrap-theme.min.css',
        'adminlte/css/AdminLTE.css',
        'adminlte/css/AdminLTE.min.css',
        
        
    ];
    public $js = [
        'bootstrap3/js/jquery.min.js',
        'bootstrap3/js/bootstrap.min.js',
        //'bootstrap3/js/bootstrap.js',
        'bootstrap3/js/npm.js',
        'adminlte/js/adminlte.js',
        'adminlte/js/adminlte.min.js',
        

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
