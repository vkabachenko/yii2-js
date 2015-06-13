<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;
use app\models\States;

/* @var $model States */

Pjax::begin(['enablePushState' => false]);
    $form = ActiveForm::begin([
        'id' => 'state-form',
        'options' => ['data-pjax' => true],
    ]);
        echo $form->field($model, 'name');
        echo Html::beginTag('div',['class' => 'form-group']);
            echo Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'submit']);
        echo Html::endTag('div');
    ActiveForm::end();
Pjax::end();




