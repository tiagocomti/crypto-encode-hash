<?php

namespace app\commands;

use yii\console\Controller;

class Base64Controller extends Controller
{
    public function actionEncode($text){
        print_r(base64_encode($text));
    }

    public function actionDecode($text){
        print_r(base64_decode($text));
    }
}