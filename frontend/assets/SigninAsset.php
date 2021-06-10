<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class SignInAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/signin.css',
        'css/site.css',
    ];
    public $js = [
    ];
    public $depends = [
        'frontend\assets\AppAsset'
    ];
}
