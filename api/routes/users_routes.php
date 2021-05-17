<?php

/* Swagger documentation */
/**
 * @OA\Info(title="move API", version="0.1"),
 * @OA\OpenApi(
 *    @OA\Server(url="http://localhost/move/api/", description="Development Environment" )
 * ),
 * @OA\SecurityScheme(
 *      securityScheme="ApiKeyAuth",
 *      in="header",
 *      name="Authorization",
 *      type="apiKey"
 * ),
 */

use Firebase\JWT\JWT;

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
 * @OA\Get(path="/user/{id}", tags={"Users"}, security={{"ApiKeyAuth": {}}},
 *      @OA\Parameter(type="string",in="path",allowReserved=true,name="id",default="1"),
 *      @OA\Response(response="200", description="Get users from database by id parameter"),
 * )
 */

Flight::route('GET /user/@id',function($id){
    $headers=getallheaders();
    $token=@$headers["Authorization"];
    try
    {
        $jwt=(array)JWT::decode($token, "JWT SECRET", ["HS256"]);
        if($jwt['id'] == $id)
        {
            $user=Flight::userService()->get_user_by_id($id);
            Flight::json($user);
        }
        else
        {
            Flight::json(["message" => "This account is not for you"],403);
        }
    }
    catch(Exception $e)
    {
        Flight::json(["message" => $e->getMessage()],403);
    }
    
    
});

/**
 * @OA\Post(path="/user/register",
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
 * @OA\Response(response="200", description="Register")
 * )
 *  
 */
Flight::route('POST /user/register', function(){
    $request=Flight::request();
    $data=$request->data->getData();
    Flight::userService()->register($data);
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

/**
 * @OA\Get(path="/user/confirm/{token}",
 *      @OA\Parameter(@OA\Schema(type="string"),in="path",allowReserved=true,name="token",default=""),
 *      @OA\Response(response="200", description="Activate profile"),
 * )
 */
Flight::route('GET /user/confirm/@token', function($token){
    Flight::userService()->confirm($token);
    Flight::json(['message' => 'Your profile has been activated!']);
}); 

/**
 * @OA\Post(path="/user/login",
 * @OA\RequestBody(
    * description="Type in login data",
    * required=true,
        * @OA\MediaType(mediaType="application/json",
            * @OA\Schema(
                * @OA\Property(property="email", type="string", example="", description="Type in email"),
                * @OA\Property(property="password", type="string", example="", description="Type in password") ) ) ),
 * @OA\Response(response="200", description="Login")
 * )
 *  
 */
Flight::route('POST /user/login', function(){
    $data=Flight::request()->data->getData();
    Flight::json(Flight::userService()->login($data));
});
  
  /**
   * @OA\Post(path="/forgot", tags={"login"}, description="Send recovery URL to users email address",
   *   @OA\RequestBody(description="Basic user info", required=true,
   *       @OA\MediaType(mediaType="application/json",
   *    			@OA\Schema(
   *    				 @OA\Property(property="email", required="true", type="string", example="myemail@gmail.com",	description="User's email address" )
   *          )
   *       )
   *     ),
   *  @OA\Response(response="200", description="Message that recovery link has been sent.")
   * )
   */
  Flight::route('POST /forgot', function(){
    $data = Flight::request()->data->getData();
    Flight::userService()->forgot($data);
    Flight::json(["message" => "Recovery token has been generated"]);
  });

/**
 * @OA\Post(path="/reset", tags={"login"}, description="Reset users password using recovery token",
 *   @OA\RequestBody(description="Basic user info", required=true,
 *       @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
 *    				 @OA\Property(property="token", required="true", type="string", example="123",	description="Recovery token" ),
 *    				 @OA\Property(property="password", required="true", type="string", example="123",	description="New password" )
 *          )
 *       )
 *     ),
 *  @OA\Response(response="200", description="Message that user has changed password.")
 * )
 */
Flight::route('POST /reset', function(){
    Flight::json(Flight::userService()->reset(Flight::request()->data->getData()));
  });