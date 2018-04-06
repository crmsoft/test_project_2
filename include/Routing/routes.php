<?php

// route mappings...
// the route should begin with forward slash

return [
    // dashboard
    '/' => 'HomeController@dashboard',
    // login
    '/login' => 'AuthController@login',
    '/post/login' => 'AuthController@postLogin',
    // register
    '/register' => 'AuthController@login',
    '/post/register' => 'AuthController@postRegister',
    // logout user
    '/logout' => 'AuthController@logout',
    // page is not found..
    '/404' => 'BaseController@notFound',
];