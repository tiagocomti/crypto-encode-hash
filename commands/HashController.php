<?php

namespace app\commands;
use yii\console\Controller;

class HashController extends Controller
{
    public function actionSha512($text){
        print_r(hash("sha512",$text));
    }

    public function actionSha256($text){
        print_r(hash("sha256",$text));
    }

    public function actionMd5($text){
        print_r(md5($text));
    }
}