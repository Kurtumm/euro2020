<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class ContentAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/navbar-top-fixed.css',
        'css/site.css',
    ];
    public $js = [
    ];
    public $depends = [
        'frontend\assets\AppAsset'
    ];
}
