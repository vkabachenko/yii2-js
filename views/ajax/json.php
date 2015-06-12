<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\JsonAsset;
use yii\web\View;

/* @var $countries Array */
/* @var $this \yii\web\View */

// declare ajax url as js variable
$urlAjax = Url::to(['ajax/states']);
$this->registerJS("var urlAjax = '$urlAjax'",View::POS_HEAD);

// register js file with ajax
JsonAsset::register($this);

echo Html::dropDownList('country', null, $countries,
    ['prompt' => 'select country',
     'id' => 'country',
     'class' => 'form-control',]);


echo Html::dropDownList('state', null, [],
    ['prompt' => 'select state/region',
     'id' => 'state',
     'class' => 'form-control',
    ]);

echo $this->render('//markdown',['filename' => 'json']);
