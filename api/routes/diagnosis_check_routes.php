<?php

/**
 * @OA\Get(path="/diagnosis_on_examination/{id}",
 *      @OA\Parameter(@OA\Schema(type="string"),in="path",allowReserved=true,name="id",default="1"),
 *      @OA\Response(response="200", description="Get diagnosis from database by examination id parameter"),
 * )
 */
Flight::route('GET /diagnosis_on_examination/@id', function($id){
    Flight::json(Flight::diagnosisCheckService()->get_diagnosis_by_examination_id($id));
});

/**
 * @OA\Get(path="/diagnosis_of_user/{id}",
 *      @OA\Parameter(@OA\Schema(type="string"),in="path",allowReserved=true,name="id",default="1"),
 *      @OA\Response(response="200", description="Get diagnosis from database by user id parameter"),
 * )
 */
Flight::route('GET /diagnosis_of_user/@id', function($id){
    Flight::json(Flight::diagnosisCheckService()->get_diagnosis_by_user_id($id));
});