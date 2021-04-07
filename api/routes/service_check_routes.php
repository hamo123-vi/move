<?php

Flight::route('GET /services_on_appointment/@id', function($id){
    Flight::json(Flight::serviceCheckService()->get_services_by_appointment_id($id));
});

Flight::route('GET /price_for_appointment/@id', function($id){
    Flight::json(Flight::serviceCheckService()->get_total_price_for_appointment($id));
});