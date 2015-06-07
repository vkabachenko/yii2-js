<?php
use app\models\Article;
use yii\helpers\Html;
use app\assets\LoadAsset;

/* @var $this yii\web\View */
/* @var $model Article */

    LoadAsset::register($this);

echo Html::activeLabel($model,'url');
echo Html::activeDropDownList($model,'url',Article::articlesList(),
    ['id' => 'articleList', 'class' => 'form-control',
        'style' => 'display:inline-block;width:200px;margin-left:20px;']);

?>
<div id="text"></div>


