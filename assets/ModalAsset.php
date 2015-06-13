<?php

namespace app\assets;

use yii\web\AssetBundle;


class ModalAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
      'css/modal.css',
    ];
    public $js = [
       'js/modal.js',
    ];
    public $depends = [
        'app\assets\AppAsset', // jQuery and Bootstrap
    ];
}
