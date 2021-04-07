<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require dirname(__FILE__)."/dao/UserDao.Class.php";
require dirname(__FILE__)."/dao/ServiceDao.Class.php";
require dirname(__FILE__).'/../vendor/autoload.php';
require_once dirname(__FILE__)."/routes/users_routes.php";
require_once dirname(__FILE__)."/routes/services_routes.php";
require_once dirname(__FILE__)."/services/UserService.class.php";
require_once dirname(__FILE__)."/services/ServiceService.class.php";

Flight::register('userDao', 'UserDao');
Flight::register('serviceDao', 'ServiceDao');

Flight::register('userService', 'UserService');
Flight::register('serviceService', 'ServiceService');

Flight::map('query', function($name, $default_value){
    $request=Flight::request();
    $query_param=@$request->data->getData()[$name];
    $query_param = $query_param ? $query_param : $default_value;
    return $query_param;
});


Flight::start();