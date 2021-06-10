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
        'vendors/bootstrap/css/bootstrap.css',
        'vendors/fontawesome/css/fontawesome.css',
        'vendors/fontawesome/css/all.css',
    ];
    public $js = [
        'vendors/bootstrap/js/bootstrap.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}
