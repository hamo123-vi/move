<?php

Flight::route('GET /users',function(){
    $offset=Flight::query('offset', 0);
    $limit=Flight::query('limit', 10);
    $users=Flight::userDao()->get_all_users($offset, $limit);
    Flight::json($users);
});

Flight::route('GET /user/@id',function($id){
    $user=Flight::userDao()->get_user_by_id($id);
    Flight::json($user);
});

Flight::route('POST /user', function(){
    $request=Flight::request();
    $data=$request->data->getData();
    Flight::userDao()->add_user($data);
    Flight::json($data);
});

Flight::route('POST /update_user/@id', function($id){
    $data=Flight::request()->data->getData();
    Flight::userDao()->update_user_by_id($id, $data);
    Flight::json($data);
});