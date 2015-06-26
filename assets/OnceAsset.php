<?php

namespace app\assets;

use yii\web\AssetBundle;


class OnceAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'js/outer.js'
    ];
    public $depends = [
        'app\assets\AppAsset', // after layout scripts
    ];
}
