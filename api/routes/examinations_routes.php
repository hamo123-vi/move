<?php

Flight::route('GET /examinations', function(){
    Flight::json(Flight::examinationService()->get_examinations());
});

Flight::route('POST /examination', function(){
    $data=Flight::request()->data->getData();
    Flight::examinationService()->insert_examination($data);
    Flight::json($data);
});