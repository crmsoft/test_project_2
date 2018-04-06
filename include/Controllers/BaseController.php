<?php

namespace App\Controllers;

use App\Auth\Auth;
use App\Exception\BasicException;
use App\Routing\Response;
use App\Routing\Router;

class BaseController{

    protected $auth;

    public function __construct()
    {
        // here is the basic logic
        // redirect if user is unauth and route is not allowed
        $this->auth = new Auth();


        if(!$this->auth->routeAllowed() && !$this->auth->isLoggedIn()){
            Response::redirect('/login');
        }

        if((Router::getRequestedRoute() == '/register' ||
            Router::getRequestedRoute() == '/login') &&
            $this->auth->isLoggedIn()){
                Response::redirect('/');
        }
    }

    /**
     * any route that not exists in ../Routing/routes.php is resolved to this function
     * @throws BasicException
     */
    public function notFound(){
        return self::view('404.php');
    }

    /**
     * @param $path
     * @return string
     * @throws BasicException
     */
    public static function view($path,$data){
        // full path of the view
        $full_path = __DIR__.'/../views/'.$path;
        // check if the such view exists
        if (!file_exists($full_path)) {
            throw  new BasicException("the view $path is not found");
        }

        ob_start();
        include($full_path);
        $view=ob_get_contents();
        ob_end_clean();

        return $view;
    }
}