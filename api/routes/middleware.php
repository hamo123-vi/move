<?php

Flight::route('*', function(){
        $headers=getallheaders();
        $token=@$headers['Authorization'];
        try
        {
            $jwt=(array)\Firebase\JWT\JWT::decode($token, "JWT SECRET", ["HS256"]);
            Flight::set('user', $jwt);
            return TRUE;
        }
        catch(Exception $e)
        {
            Flight::json(["message" => $e->getMessage()],403);
            die;
        }
    });