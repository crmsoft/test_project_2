<?php

namespace App;

use App\Routing\Router;

class App{
    /**
     * return response from the controller
     * @return mixed
     * @throws Exception\BasicException
     */
    public static function handle(){
        return Router::resolve();
    }
}