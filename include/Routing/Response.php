<?php

namespace App\Routing;

class Response{

    public static function redirect( $route ){
        header('Location: '.$route);
        die;
    }

    public static function back(){
        self::redirect(isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER']:'/');
    }

}