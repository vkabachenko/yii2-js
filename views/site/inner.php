<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $interval Integer */

$script = "var interval = $interval;
           $('#content').hide();
           $('#button').fadeIn(interval);
          ";

$this->registerJs($script);


echo Html::button('Click to show/hide article',[
    'id' => 'button',
    'class' => 'btn btn-primary btn-lg',
    'style' => 'margin-bottom:20px;display:none',
    'onclick' => "$('#content').toggle(interval)",
]);

echo $this->render('//markdown',['filename' => 'inner']);
