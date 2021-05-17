<?php

use Firebase\JWT\JWT;

Flight::before('start', function(&$params, &$output){
    if(Flight::request()->url == '/swagger/') return TRUE;
    if(str_starts_with(Flight::request()->url, "/users")) return TRUE;
    $headers=getallheaders();
    $token=@$headers["Authorization"];
    try
    {
        $jwt=(array)JWT::decode($token, "JWT SECRET", ["HS256"]);
        return TRUE;
        
    }
    catch(Exception $e)
    {
        Flight::json(["message" => $e->getMessage()],403);
        die;
    }
});

?>