<?php

/* Swagger documentation */
/**
 * @OA\Info(title="Move API", version="0.1")
 * @OA\OpenApi(
 *    @OA\Server(url="http://localhost/move/api/", description="Development Environment" )
 * ),
 * @OA\SecurityScheme(securityScheme="ApiKeyAuth", type="apiKey", in="header", name="Authentication" )
 */

/**
 * @OA\Get(
 *     path="/users",
 *     @OA\Response(response="200", description="Get users from database")
 * )
 */

Flight::route('GET /users',function(){
    $offset=Flight::request()->query['offset'];
    $limit=Flight::request()->query['limit'];
    $users=Flight::userService()->get_all_users(0, 5);
    Flight::json($users);
});

/**
 * @OA\Post(
 *     path="/user{id}",
 *      @OA\Parameter(@OA\Schema(type="string"),in="path",allowReserved=true,name="id"),
 *      @OA\Response(response="200", description="Get users from database by id parameter"),
 * )
 */

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

Flight::route('PUT /update_user/@id', function($id){
    $data=Flight::request()->data->getData();
    Flight::userService()->update_user_by_id($id, $data);
    Flight::json($data);
});