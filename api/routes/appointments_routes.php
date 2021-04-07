<?php

Flight::route('GET /appointments', function(){
    Flight::json(Flight::appointmentService()->get_all_appointments());
});

Flight::route('POST /appointment', function(){
    $data=Flight::request()->data->getData();
    Flight::appointmentService()->insert_appointment($data);
    Flight::json($data);
});

Flight::route('PUT /update_appointment/@id', function($id){
    $data=Flight::request()->data->getData();
    Flight::appointmentService()->update_appointment($id, $data);
    Flight::json($data);
});