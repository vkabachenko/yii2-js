<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $interval Integer */

$script = "var interval = ".$interval.";".
    <<<JS
    $('#content').hide();
    $('#button').fadeIn(interval);
JS;

$this->registerJs($script);


echo Html::button('Click to show/hide instructions',[
    'id' => 'button',
    'class' => 'btn btn-primary btn-lg',
    'style' => 'margin-bottom:20px;display:none',
    'onClick' => "$('#content').toggle(interval)",
]);

echo $this->render('//markdown',['filename' => 'inner']);
