<?php

use yii\helpers\Html;
use app\models\Countries;
use yii\widgets\Pjax;

/* @var $id_country integer */
/* @var $state string */
/* @var $this \yii\web\View */

$countries = Countries::getList();

?>

<div class="row">

    <div class="col-xs-5">

       <?= Html::beginForm(['ajax/pjax'],'get'); ?>
       <?= Html::label('Select country to edit states/regions','country'); ?>

       <?= Html::dropDownList('id_country', $id_country, $countries,
             ['prompt' => 'select country',
            'id' => 'country',
            'class' => 'form-control',
            'onchange' => 'this.form.submit()']); ?>
       <?= Html::endForm(); ?>
    </div>

    <div class="col-xs-5 col-xs-offset-2">

    <?php if ($id_country) :?>
        <?php   Pjax::begin(['enablePushState' => false]); ?>
        <?= $this->render('editState',['id_country' => $id_country, 'model' => $state]); ?>
        <?php Pjax::end(); ?>
    <?php endif; ?>

    </div>

</div>

<div class="row">
    <?= $this->render('//markdown',['filename' => 'pjax']); ?>
</div>




