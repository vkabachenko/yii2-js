<?php

namespace app\controllers;

use app\models\Countries;
use app\models\States;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use app\models\Article;
use yii\web\NotFoundHttpException;
use yii\web\Response;


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

    public function actionJson()
    {

        $countries = Countries::find()->orderBy('name')->asArray()->all();
        $countries = ArrayHelper::map($countries,'id','name');

        return $this->render('json',['countries' => $countries]);

    }

    // for ajax call from the view 'json'
    public function actionStates($id_country)
    {

        if (Yii::$app->request->isAjax) {

            Yii::$app->response->format = Response::FORMAT_JSON;

            return States::find()->select(['id','name'])
                ->where(['id_country' => $id_country])
                ->orderBy('name')->all();

        }
        else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

    }


} 