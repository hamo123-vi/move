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
 *     @OA\Response(response="200", description="Get users from database"),
 *     @OA\Parameter(@OA\Schema(type="integer"),in="query",name="offset",default=0, description="Offset query parameter"),
 *     @OA\Parameter(@OA\Schema(type="integer"),in="query",name="limit",default=25, description="Limit query parameter"),
 * )
 */

Flight::route('GET /users',function(){
    $offset=Flight::request()->query['offset'];
    $limit=Flight::request()->query['limit'];
    $users=Flight::userService()->get_all_users($offset, $limit);
    Flight::json($users);
});

/**
 * @OA\Get(path="/user{id}",
 *      @OA\Parameter(@OA\Schema(type="string"),in="path",allowReserved=true,name="id",default="/1"),
 *      @OA\Response(response="200", description="Get users from database by id parameter"),
 * )
 */

Flight::route('GET /user/@id',function($id){
    $user=Flight::userService()->get_user_by_id($id);
    Flight::json($user);
});

/**
 * @OA\Post(path="/user",
 * @OA\RequestBody(
    * description="Main user info",
    * required=true,
        * @OA\MediaType(mediaType="application/json",
            * @OA\Schema(
                * @OA\Property(property="email", type="string", example="", description="Type in email"),
                * @OA\Property(property="password", type="string", example="", description="Type in password"),
                * @OA\Property(property="first_name", type="string", example="", description="Type in name"),
                * @OA\Property(property="last_name", type="string", example="", description="Type in surname"),
                * @OA\Property(property="phone_number", type="string", example="", description="Type in phone number") ) ) ),
 * @OA\Response(response="200", description="Insert user in database")
 * )
 *  
 */
Flight::route('POST /user', function(){
    $request=Flight::request();
    $data=$request->data->getData();
    Flight::userService()->add_user($data);
    Flight::json($data);
});

/**
 * @OA\Put(path="/update_user/{id}",
 * @OA\RequestBody(
    * description="User info for update",
    * required=true,
        * @OA\MediaType(mediaType="application/json",
            * @OA\Schema(
                * @OA\Property(property="email", type="string", example="", description="Type in email"),
                * @OA\Property(property="password", type="string", example="", description="Type in password"),
                * @OA\Property(property="first_name", type="string", example="", description="Type in name"),
                * @OA\Property(property="last_name", type="string", example="", description="Type in surname"),
                * @OA\Property(property="phone_number", type="string", example="", description="Type in phone number") ) ) ),
 * @OA\Parameter(@OA\Schema(type="string"),in="path",allowReserved=true,name="id",default=1),
 * @OA\Response(response="200", description="Update user")
 * )
 *  
 */
Flight::route('PUT /update_user/@id', function($id){
    $data=Flight::request()->data->getData();
    Flight::userService()->update_user_by_id($id, $data);
    Flight::json($data);
});