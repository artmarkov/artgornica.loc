<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 05.10.2018
 * Time: 12:14
 */

namespace backend\controllers;


class DefaultController  extends \yeesoft\controllers\admin\BaseController {

    public function debug($arr){
        echo '<pre>' . print_r($arr, true) . '</pre>';
    }
}