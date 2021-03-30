<?php

Flight::route('GET /users',function(){
    $offset=Flight::query('offset', 0);
    $limit=Flight::query('limit', 10);
    print_r($offset);
    print_r($limit);
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