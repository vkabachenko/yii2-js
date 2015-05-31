<?php
// convert markdown file to html
use yii\helpers\Html;

/* @var $filename String */

$markdown = file_get_contents(Yii::getAlias('@app/docs/'.$filename.'.md'));

$parser = new \cebe\markdown\Markdown();
$html = $parser->parse($markdown);

echo Html::tag('div',$html,['id' => 'content',]);


