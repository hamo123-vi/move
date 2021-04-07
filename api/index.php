<?php

#Import FlightPHP modules
require dirname(__FILE__).'/../vendor/autoload.php';

#Import Dao layer
require_once dirname(__FILE__)."/dao/UserDao.Class.php";
require_once dirname(__FILE__)."/dao/ServiceDao.Class.php";
require_once dirname(__FILE__)."/dao/ServiceCheckDao.Class.php";

#Import Routes layer
require_once dirname(__FILE__)."/routes/users_routes.php";
require_once dirname(__FILE__)."/routes/services_routes.php";
require_once dirname(__FILE__)."/routes/service_check_routes.php";

#Import Services layer
require_once dirname(__FILE__)."/services/UserService.class.php";
require_once dirname(__FILE__)."/services/ServiceService.class.php";
require_once dirname(__FILE__)."/services/ServiceCheckService.class.php";

#Registering Dao layer
Flight::register('userDao', 'UserDao');
Flight::register('serviceDao', 'ServiceDao');
Flight::register('serviceCheckDao', 'ServiceCheckDao');

#Registering Service layer
Flight::register('userService', 'UserService');
Flight::register('serviceService', 'ServiceService');
Flight::register('serviceCheckService', 'ServiceCheckService');

#Mapping 'query' function
Flight::map('query', function($name, $default_value){
    $request=Flight::request();
    $query_param=@$request->data->getData()[$name];
    $query_param = $query_param ? $query_param : $default_value;
    return $query_param;
});


Flight::start();