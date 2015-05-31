<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class SiteController extends Controller
{


    public function actionIndex()
    {
        return $this->render('index');
    }

    // renders view with js in outer file
    public function actionOuter()
    {
        return $this->render('outer');
    }

    // renders view with js inner scripts
    public function actionInner()
    {
        $interval = 1000; // php variable to pass into js script
        return $this->render('inner',['interval' => $interval]);
    }

}
