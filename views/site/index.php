<?php
/* @var $this yii\web\View */

?>
<div class="site-index">
    <p>To run js script in all views:</p>
    <ul>
    <li>put script file into <var>web/js</var> folder</li>
    <li>specify this file in the <code>$js</code> property of main asset file <var>AppAsset.php</var></li>
    <li>register <code>AppAsset</code> class in the template view file such as <var>views/layouts/main.php</var>
    <br/><code>AppAsset::register($this);</code></li>
    </ul>

</div>
