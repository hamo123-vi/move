<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require dirname(__FILE__)."/dao/UserDao.Class.php";
require dirname(__FILE__).'/../vendor/autoload.php';

Flight::route('GET /users',function(){
    $dao=new UserDao();
    $users=$dao->get_all_users();
    Flight::json($users);
});

Flight::route('GET /user/@id',function($id){
    $dao=new UserDao();
    $user=$dao->get_user_by_id($id);
    Flight::json($user);
});

Flight::route('POST /user', function(){
    $request=Flight::request();
    $data=$request->data->getData();
    $dao=new UserDao();
    $dao->add_user($data);
    Flight::json($data);
});

Flight::route('POST /update_user/@id', function($id){
    $dao=new UserDao();
    $data=Flight::request()->data->getData();
    $dao->update_user_by_id($id, $data);
    Flight::json($data);
});



Flight::start();