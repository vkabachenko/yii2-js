<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Article;
use yii\web\NotFoundHttpException;


class AjaxController extends Controller {


    // demo for simple jQuery load method using ajax
    public function actionLoad()
    {
        /* @var $model Article */
        $model = new Article();
        $model->url = Article::makeUrl('load'); // current article

        return $this->render('load',['model' => $model]);
    }

    // for ajax call from the view 'load'
    public function actionLoadFile($filename) {

        if (Yii::$app->request->isAjax) {
            return $this->renderPartial('//markdown',['filename' => $filename]);
        }
        else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



} 