<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use app\assets\GridAsset;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CountriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

GridAsset::register($this);

?>

    <p>
        <?= Html::a('New country', ['grid/create'],
            [
                'class' => 'btn btn-success',
                'id' => 'actionCreate',
            ]) ?>
    </p>

<?php Pjax::begin(['options' => ['id' =>'pjaxWrap']]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',
            'capital',
            'area',
            'population',
            [ // column for grid action buttons
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}{delete}',
                'buttons' => [
                    'view' => 'actionView',
                    'update' => 'actionUpdate',
                    'delete' => 'actionDelete',
                    ]
            ],
        ],
    ]); ?>

<?php Pjax::end(); ?>

<?= $this->render('//markdown',['filename' => 'grid']); ?>


<!-- Additional  -->

<!-- Modal window declaration -->
<?php Modal::begin([
    'id' => 'modalWindow',
    'header' => '<h2>Header</h2>',
]); ?>

<?php Modal::end(); ?>
<!-- End of modal window declaration -->

<!-- functions for grid buttons actions -->
<?php

function actionView($url,$model,$key) {
    $url = Url::to(['grid/view','id' => $key]);
    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',
        $url,[
            'class' => 'actionView',
            'data-pjax' => '0',
        ]);
}

function actionUpdate($url,$model,$key) {
    $url = Url::to(['grid/update','id' => $key]);
    return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
        $url,[
            'class' => 'actionUpdate',
            'data-pjax' => '0',
        ]);
}

function actionDelete($url,$model,$key) {
    $url = Url::to(['grid/delete','id' => $key]);
    return Html::a('<span class="glyphicon glyphicon-trash"></span>',
        $url,[
            'class' => 'actionDelete',
            'data-pjax' => '0',
        ]);
}



?>
<!-- End of functions for grid buttons actions -->
