<?php
/**
 * Created by PhpStorm.
 * User: gurik
 * Date: 11.09.2018
 * Time: 7:09
 */

namespace app\models;


class Utils
{
    public static function debug($data) {
        $script = $_SERVER['REQUEST_URI'];
        echo "<pre><h1>Дебажим...</h1><hr>";
        echo "<h3>При выполнении $script, получаем:</h3>";
        var_dump($data);
        echo "<hr><h1>Не дебажим...</h1></pre>";
    }

}