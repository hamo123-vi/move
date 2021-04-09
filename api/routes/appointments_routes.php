<?php

/**
 * @OA\Get(
 *     path="/appointments",
 *     @OA\Response(response="200", description="Get appointments from database")
 * )
 */
Flight::route('GET /appointments', function(){
    Flight::json(Flight::appointmentService()->get_all_appointments());
});

/**
 * @OA\Post(path="/appointment",
 * @OA\RequestBody(
    * description="Main appointment info",
    * required=true,
        * @OA\MediaType(mediaType="application/json",
            * @OA\Schema(
                * @OA\Property(property="user_id", type="string", example="", description="Type in user id"),
                * @OA\Property(property="date", type="string", example="", description="Type in date"),
                * @OA\Property(property="time", type="integer", example="", description="Type in time"),
                * @OA\Property(property="message", type="string", example="", description="Type in message") ) ) ),
 * @OA\Response(response="200", description="Insert appointment in database")
 * )
 *  
 */
Flight::route('POST /appointment', function(){
    $data=Flight::request()->data->getData();
    Flight::appointmentService()->insert_appointment($data);
    Flight::json($data);
});

/**
 * @OA\Put(path="/update_appointment/{id}",
 * @OA\RequestBody(
    * description="Appointment info for update",
    * required=true,
        * @OA\MediaType(mediaType="application/json",
            * @OA\Schema(
                * @OA\Property(property="user_id", type="string", example="", description="Type in user id"),
                * @OA\Property(property="date", type="string", example="", description="Type in date"),
                * @OA\Property(property="time", type="integer", example="", description="Type in time"),
                * @OA\Property(property="message", type="string", example="", description="Type in message") ) ) ),
 * @OA\Parameter(@OA\Schema(type="string"),in="path",allowReserved=true,name="id",default=1),
 * @OA\Response(response="200", description="Update appointment")
 * )
 *  
 */
Flight::route('PUT /update_appointment/@id', function($id){
    $data=Flight::request()->data->getData();
    Flight::appointmentService()->update_appointment($id, $data);
    Flight::json($data);
});