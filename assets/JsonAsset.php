<?php

namespace app\assets;

use yii\web\AssetBundle;


class JsonAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
      'css/json.css',
    ];
    public $js = [
       'js/json.js',
    ];
    public $depends = [
        'app\assets\AppAsset', // jQuery and Bootstrap
    ];
}
