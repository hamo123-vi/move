<?php

Flight::route('GET /services_on_appointment/@id', function($id){
    Flight::json(Flight::serviceCheckService()->get_services_by_appointment_id($id));
});