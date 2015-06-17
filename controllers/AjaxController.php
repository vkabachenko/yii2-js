<?php

namespace app\controllers;

use app\models\Countries;
use app\models\States;
use Yii;
use yii\web\Controller;
use app\models\Article;
use yii\web\Response;
use bupy7\ajaxfilter\AjaxFilter;



class AjaxController extends Controller {

    public function behaviors()
    {
        return [

            [
                'class' => AjaxFilter::className(),
                'actions' => ['load-file', 'states','update-state','create-state',],
            ],
        ];
    }

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

            return $this->renderPartial('//markdown',['filename' => $filename]);

    }

    public function actionJson()
    {

        return $this->render('json');

    }

    // for ajax call from the view 'json'
    public function actionStates($id_country)
    {

            Yii::$app->response->format = Response::FORMAT_JSON;

            return States::find()->select(['id','name'])
                ->where(['id_country' => $id_country])
                ->orderBy('name')->all();

    }

    public function actionPjax($id_country = null)
    {

        $state = States::firstRecord($id_country);

        return $this->render('pjax',['id_country' => $id_country, 'state' => $state,]);

    }


    // for ajax call from the view 'pjax'
    public function actionUpdateState()
    {
        /* @var $model States */

        // current updated model
        $id = (integer)Yii::$app->request->post('States')['id'];
        $model = States::findOne($id);
        $id_country = $model->id_country;

        // method to run according the name of pressed button
        $method = $this->buttonPressed().'State';

        // change the model to pass to view
        $model = $this->$method($model);

        return $this->renderAjax('editState',['id_country' => $id_country,'model' => $model]);
    }

    // for ajax call from the view 'pjax'
    public function actionCreateState($id_country) {
        /* @var $model States */
        $model = new States;

        $request = Yii::$app->request;
        $model->id_country = $id_country;

        if ($request->post('submit') && $model->load($request->post()) ) {
            $model->save();
            Yii::$app->session->setFlash('success', 'Item is succesfully created.');
            }
        elseif ($request->post('discard')) {
            $model = States::firstRecord($id_country);
            Yii::$app->session->setFlash('success', 'Creation of item is succesfully discarded.');
        }

        return $this->renderAjax('editState',['id_country' => $id_country,'model' => $model]);

    }


    // private functions

    /**
     * name of pressed submit button in form
     * default - 'discard'
     * @return string
     */

    private function buttonPressed()
    {
        $availableButtons = ['submit','discard','prev','next','del',];
        $defaultButton = 'discard';

        foreach($availableButtons as $button) {
            if (Yii::$app->request->post($button))
                return $button;
        }

        return $defaultButton;
    }

    /* set of private function of changing model according to button pressed
    Signature: <buttonName>State($model)
    Return: $model
    */

    private function submitState($model)
    {
        /* @var $model States */
        $model->load(Yii::$app->request->post());
        $model->save();
        Yii::$app->session->setFlash('success', 'Data are succesfully updated.');

        return $model;

    }

    private function discardState($model)
    {
        /* @var $model States */
        Yii::$app->session->setFlash('success', 'Data are succesfully discarded.');

        return $model;

    }

    private function prevState($model)
    {
        /* @var $model States */
        $prev = States::find()
            ->where(['id_country' => $model->id_country])
            ->andwhere(['<','name',"$model->name"])
            ->orderBy('name desc')->one();
        if ($prev) {
            return $prev;
        }
        else {
            Yii::$app->session->setFlash('warning', 'First record is achieved.');
            return $model;
        }

    }

    private function nextState($model)
    {
        /* @var $model States */
        $next = States::find()
            ->where(['id_country' => $model->id_country])
            ->andwhere(['>','name',"$model->name"])
            ->orderBy('name')->one();
        if ($next) {
            return $next;
        }
        else {
            Yii::$app->session->setFlash('warning', 'Last record is achieved.');
            return $model;
        }

    }

    private function delState($model)
    {
        /* @var $model States */
        $id_country = $model->id_country;
        $model->delete();
        $model = States::firstRecord($id_country);
        Yii::$app->session->setFlash('success', 'Selected item is succesfully deleted.');

        return $model;

    }

    // end of set of private function of changing model according to button pressed

} 