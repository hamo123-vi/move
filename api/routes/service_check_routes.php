<?php

/**
 * @OA\Get(path="/services_on_appointment/{id}",
 *      @OA\Parameter(@OA\Schema(type="string"),in="path",allowReserved=true,name="id",default="1"),
 *      @OA\Response(response="200", description="Get services from database by appointment id parameter"),
 * )
 */
Flight::route('GET /services_on_appointment/@id', function($id){
    Flight::json(Flight::serviceCheckService()->get_services_by_appointment_id($id));
});

/**
 * @OA\Get(path="/price_for_appointment/{id}",
 *      @OA\Parameter(@OA\Schema(type="string"),in="path",allowReserved=true,name="id",default="1"),
 *      @OA\Response(response="200", description="Get price for appointment by appointment id parameter"),
 * )
 */
Flight::route('GET /price_for_appointment/@id', function($id){
    Flight::json(Flight::serviceCheckService()->get_total_price_for_appointment($id));
});