<?php

Flight::route('GET /users',function(){
    $offset=Flight::request()->query['offset'];
    $limit=Flight::request()->query['limit'];
    $users=Flight::userService()->get_all_users($offset, $limit);
    Flight::json($users);
});

Flight::route('GET /user/@id',function($id){
    $user=Flight::userService()->get_user_by_id($id);
    Flight::json($user);
});

Flight::route('POST /user', function(){
    $request=Flight::request();
    $data=$request->data->getData();
    Flight::userService()->add_user($data);
    Flight::json($data);
});

Flight::route('POST /update_user/@id', function($id){
    $data=Flight::request()->data->getData();
    Flight::userDao()->update_user_by_id($id, $data);
    Flight::json($data);
});