<?php

namespace App\Controllers;

class HomeController extends BaseController{

    public function dashboard(){
        return self::view('dashboard.php',[
            'user' => $this->auth->getUser()
        ]);
    }

}