<?php

namespace App\Auth;

use App\DB\CRUD;
use App\Routing\Router;

// start the session
session_start();

class Auth{

    private $user;
    private $allowed_routes = [
        '/login',
        '/post/login',
        '/register',
        '/post/register'
    ];

    public function __construct()
    {
        if(self::isLoggedIn()){
            $db = new CRUD();
            $this->user = $db->getUser($_SESSION['user']);
        }
    }

    public function getUser(){
        return $this->user;
    }

    public function routeAllowed(){
        return in_array(Router::getRequestedRoute(), $this->allowed_routes);
    }

    public function isLoggedIn(){
        return isset($_SESSION['user']);
    }

    public static function logout(){
        unset($_SESSION['user']);
        session_destroy();
    }

    public static function login( $user_id ){
        $_SESSION['user'] = $user_id;
    }

    public static function makePassword($password){
        return password_hash($password,PASSWORD_BCRYPT);
    }

    public static function verifyPassword($password,$password_hash){
        return password_verify($password,$password_hash);
    }

}