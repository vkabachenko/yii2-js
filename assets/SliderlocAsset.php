<?php

namespace app\assets;

use yii\web\AssetBundle;


class SliderlocAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/sliderloc.css'
    ];
    public $depends = [
        'app\widgets\slider\SliderAsset',
    ];
}
