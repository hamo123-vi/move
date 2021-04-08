<?php

Flight::route('GET /diagnosis_on_examination/@id', function($id){
    Flight::json(Flight::diagnosisCheckService()->get_diagnosis_by_examination_id($id));
});