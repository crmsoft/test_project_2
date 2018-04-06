<?php

namespace App\Controllers;

class HomeController extends BaseController{

    /**
     * @return string
     * @throws \App\Exception\BasicException
     */
    public function dashboard(){
        return self::view('dashboard.php',[
            'user' => $this->auth->getUser()
        ]);
    }

}