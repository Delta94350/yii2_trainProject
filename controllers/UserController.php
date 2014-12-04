<?php

namespace app\controllers;

use app\models\User;
use yii\web\Request;

class UserController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
       if(User::isConnected()) {
           return $this->render('index');
       }
       
       $request = new Request();
       $id = $request->getQueryParam('t');
       
       if($id == 'p') {
            $model = new User();
       
            return $this->render('login', array(
                'model' => $model
            ));
       }
    }

}
