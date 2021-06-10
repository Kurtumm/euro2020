<?php

namespace common\controllers;

use yii\web\Controller;

/**
 * Site controller
 */
class MasterController extends Controller {

    public $breadcrumbs = [];
//    public $layout = 'content';

    public function writeToFile($fileName, $string, $mode = 'w+') {
        $handle = fopen($fileName, $mode);
        fwrite($handle, $string);
        fclose($handle);
    }
}
