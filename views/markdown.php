<?php
// output markdown file as html
use yii\helpers\Html;
use app\models\Article;

/* @var $filename String */

$html = Article::getContent($filename);

echo Html::tag('div',$html,['id' => 'content',]);


