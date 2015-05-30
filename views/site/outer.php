<?php

use app\assets\OnceAsset;
use yii\helpers\Html;

/* @var $this yii\web\View */

OnceAsset::register($this);

echo Html::button('Click to show/hide instructions',[
    'id' => 'button',
    'class' => 'btn btn-primary btn-lg',
    'style' => 'margin-bottom:20px;',
])

?>


<div class="site-outer">
    <p>To run outer js script in selected view:</p>
    <ul>
    <li>put script file into <var>web/js</var> folder</li>
    <li>make asset class, e.g. <var>OnceAsset</var> for this view</li>
    <li>specify script file in the <code>$js</code> property of asset class </li>
    <li>add <code>yii\web\JqueryAsset</code> class in <code>$depends</code> property of asset class if your script uses jQuery</li>
    <li>register asset class in the view as follows:
    <br/><code>OnceAsset::register($this);</code></li>
    </ul>

</div>
