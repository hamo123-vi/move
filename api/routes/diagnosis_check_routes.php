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

/**
 * @OA\Post(path="/diagnosis_check",
 * @OA\RequestBody(
    * description="Many to many diagnosis table",
    * required=true,
        * @OA\MediaType(mediaType="application/json",
            * @OA\Schema(
                * @OA\Property(property="diagnosis_id", type="integer", example="", description="Type in diagnosis_id"),
                * @OA\Property(property="examination_id", type="integer", example="", description="Type in examination_id") ) ) ),
 * @OA\Response(response="200", description="Insert diagnosis_check in database")
 * )
 *  
 */
Flight::route('POST /diagnosis_check', function(){
    $data=Flight::request()->data->getData();
    Flight::diagnosisCheckService()->add_diagnosis_check($data);
    Flight::json($data);
});