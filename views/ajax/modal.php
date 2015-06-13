<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use app\assets\ModalAsset;

/* @var $countries Array */
/* @var $this \yii\web\View */

ModalAsset::register($this);

echo Html::label('Select country to edit states/regions','country');

echo Html::dropDownList('country', null, $countries,
    ['prompt' => 'select country',
        'id' => 'country',
        'class' => 'form-control',]);


// modal window, temporary hidden

Modal::begin([
    'id' => 'modalWindow',
    'clientOptions' => ['backdrop' => 'static']
]);

Modal::end();


