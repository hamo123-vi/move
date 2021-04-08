<?php

Flight::route('POST /diagnosis', function(){
    $data=Flight::request()->data->getData();
    Flight::diagnosisService()->insert_diagnosis($data);
    Flight::json($data);
});