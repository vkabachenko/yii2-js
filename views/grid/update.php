<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Countries */
/* @var $form yii\widgets\ActiveForm */

?>

<?php $form = ActiveForm::begin(['id' => 'updateForm']); ?>

<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'capital')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'area')->textInput() ?>

<?= $form->field($model, 'population')->textInput() ?>

<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>


<!-- Additional -->

<!-- Js script for ajax submitting form -->

<?php

$script =
    <<<JS

$('#updateForm').on('beforeSubmit',function(){ // runs after client validation

    $.post( // method - post
        $(this).attr('action'), // url in form's action
        $(this).serialize(),    // all form's data - to query string

        function(data) {            // update action returns success
                 $('#modalWindow .modal-body').html(data); 

                 // check if there were ajax valoidation errors                                                      
                 var scriptPos = data.indexOf('\$script'); // found the beginning position of js script in returning html code 
                 var htmlCode = data.substring(0, scriptPos); // html code without script text

                 if (htmlCode.indexOf('has-error') != -1) { // if ajax validation errors exists would be has-error class

                        return false; // return without closing modal window
                  }

                    var interval = data ? 1000 : 0; //timeout interval for creation - 1 sec
                    // show alert message and hide
                    setTimeout(function(){
                        $('#modalWindow').modal('hide'); // hide modal window
                        $.pjax.reload({container:"#pjaxWrap"}); // reload grid
                    },interval);
        });

    return false; // stops further submitting actions

});

JS;

$this->registerJs($script);




