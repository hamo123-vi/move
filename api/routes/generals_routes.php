<?php

Flight::route('GET /general/@entity', function($entity){
    Flight::json(Flight::generalService()->get_general($entity));
});

Flight::route('PUT /general/@entity', function(){
    $data=Flight::request()->data->getData();
    Flight::generalService()->update_generals($data);
});