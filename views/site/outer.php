<?php

use app\assets\OnceAsset;
use yii\helpers\Html;

/* @var $this yii\web\View */

OnceAsset::register($this);

echo Html::button('Click to show/hide article',[
    'id' => 'button',
    'class' => 'btn btn-primary btn-lg',
    'style' => 'margin-bottom:20px;',
]);

echo $this->render('//markdown',['filename' => 'outer']);
