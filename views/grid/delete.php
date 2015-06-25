<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\Countries */

?>
<p>
    Do you want to remove the country <?= $model->name ?> from the list?
</p>

<?= Html::a('Remove',['grid/delete','id' => $model->id],
            ['class' => 'btn btn-primary',
             'id' => 'deleteButton']); ?>

<!-- Additional -->

<!-- Js script for ajax clicking button -->

<?php

$script =
    <<<JS

$('#deleteButton').click(function(){

    $.post(
        $(this).attr('href'),
        {'approve': 'yes'},
        function() {
                    $('#modalWindow').modal('hide');
                    $.pjax.reload({container:"#pjaxWrap"});
        });

    return false;

});

JS;

$this->registerJs($script);
