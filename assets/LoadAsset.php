<?php

namespace app\assets;

use yii\web\AssetBundle;


class LoadAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'js/load.js'
    ];
    public $depends = [
        'app\assets\AppAsset',
    ];
}
