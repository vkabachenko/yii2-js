<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */
$this->title = 'Yii2 & JavaScript';

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => $this->title,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Home', 'url' => ['site/index']],
                    ['label' => 'Pure JS', 'items' => [
                        ['label' => 'Outer script file in view', 'url' =>  ['site/outer'],],
                        ['label' => 'Inner script in view', 'url' =>  ['site/inner'],],
                        ['label' => 'Third party widget', 'url' =>  ['site/widget'],],
                    ],
                  ],
                    ['label' => 'Ajax', 'items' => [
                        ['label' => 'Simple html loading', 'url' => ['ajax/load'],],
                    ]
                  ],
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <h1>JavaScript in Yii2 examples</h1>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; <?= $this->title.' '.date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
