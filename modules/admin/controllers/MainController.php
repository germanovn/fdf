<?php

namespace app\modules\admin\controllers;

class MainController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
