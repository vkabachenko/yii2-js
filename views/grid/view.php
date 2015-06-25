<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Countries */

?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'capital',
            'area',
            'population',
        ],
    ]) ?>

