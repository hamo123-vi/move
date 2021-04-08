<?php

Flight::route('POST /diagnosis', function(){
    $data=Flight::request()->data->getData();
    Flight::diagnosisService()->insert_diagnosis($data);
    Flight::json($data);
});

Flight::route('PUT /update_diagnosis/@id', function($id){
    $data=Flight::request()->data->getData();
    Flight::diagnosisService()->update_diagnosis($data, $id);
    Flight::json($data);
});