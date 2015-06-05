<?php

namespace app\widgets\slider;

use yii\web\AssetBundle;


class SliderAsset extends AssetBundle
{
    public $sourcePath = '@bower/slick-carousel';
    public $css = [
        'slick/slick.css',
        'slick/slick-theme.css',
    ];
    public $js = [
        'slick/slick.min.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
