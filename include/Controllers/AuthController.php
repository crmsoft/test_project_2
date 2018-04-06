<?php

namespace App\Controllers;

use App\Auth\Auth;
use App\DB\CRUD;
use App\Routing\Response;
use App\Validator\BasicValidator;

class AuthController extends BaseController{

    /**
     * show login form
     * @return string
     * @throws \App\Exception\BasicException
     */
    public function login(){
        return self::view('login.php');
    }

    public function logout(){
        Auth::logOut();
        Response::redirect('/login');
    }

    /**
     * login user
     * @throws \App\Exception\BasicException
     */
    public function postLogin(){
        $result = BasicValidator::validate([
            'email' => 'email',
            'password' => 'password'
        ]);

        unset($_SESSION['show_register']);
        if(!empty($result['errors'])){
            $_SESSION['errors'] = $result['errors'];
            Response::back();
        } $_SESSION['errors'] = [];

        $db = new CRUD();
        // try to find user in db
        if($user_id = $db->login($result['validated']['email'],$result['validated']['password'])){
            Auth::login($user_id);
            Response::redirect('/');
        }

        $_SESSION['message'] = 'Credentials are not match our records.';
        Response::back();
    }

    /**
     * create user
     * @throws \App\Exception\BasicException
     */
    public function postRegister(){

        $result = BasicValidator::validate([
            'first_name' => 'text',
            'last_name' => 'text',
            'phone' => 'text',
            'email' => 'email',
            'password' => 'password'
        ]);

        unset($_SESSION['show_register']);
        unset($_SESSION['message']);
        if(!empty($result['errors'])){
            $_SESSION['errors'] = $result['errors'];
            $_SESSION['show_register'] = true;
            Response::back();
        } $_SESSION['errors'] = [];

        // try to add user
        $db = new CRUD();
        $user = $db->createUser($result['validated']);
        if ($user == 'created') {
            $_SESSION['message'] = 'successfully registered';
        }else if($user == 'email-used'){
            $_SESSION['message'] = 'email already taken';
            $_SESSION['show_register'] = true;
        }else{
            $_SESSION['message'] = 'some error occurred';
            $_SESSION['show_register'] = true;
        }

        Response::back();
    }

}