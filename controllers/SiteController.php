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


}
