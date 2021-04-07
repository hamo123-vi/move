<?php

Flight::route('GET /appointments', function(){
    Flight::json(Flight::appointmentService()->get_all_appointments());
});