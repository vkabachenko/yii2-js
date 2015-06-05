<?php

use app\widgets\slider\Widget;
use app\assets\SliderlocAsset;
use yii\helpers\Html;

SliderlocAsset::register($this); // local widget css

// current image description above the widget
echo Html::tag('p','Third image',['id' => 'imgDescr',]);

// slider widget
echo Widget::widget([
    'items' => [
        Html::img('@web/img/1.jpg',['alt' => 'First image',]),
        Html::img('@web/img/2.jpg',['alt' => 'Second image',]),
        Html::img('@web/img/3.jpg',['alt' => 'Third image',]),
    ],
    'clientEvents' => [
      'afterChange' =>
          "function(event, slick, currentSlide) {
              var currImg = $('#sliderTest img')[currentSlide];
              $('#imgDescr').text($(currImg).attr('alt'));
            }",
    ],
    'clientOptions' => [
        'autoplay' => true,
        'autoplaySpeed' =>2000,
        'dots' => true,
    ],
    'options' => [
        'id' => 'sliderTest',
    ]
]);

// widget's "how to" md file
echo $this->render('//markdown',['filename' => 'widget']);