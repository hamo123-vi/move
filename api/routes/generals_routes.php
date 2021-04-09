<?php

/**
 * @OA\Get(path="/general/{entity}",
 *      @OA\Parameter(@OA\Schema(type="string"),in="path",allowReserved=true,name="entity",default="about"),
 *      @OA\Response(response="200", description="Get general info from database by name of column saved below"),
 * )
 */
Flight::route('GET /general/@entity', function($entity){
    Flight::json(Flight::generalService()->get_general($entity));
});


/**
 * @OA\Put(path="/general/{entity}",
 * @OA\RequestBody(
    * description="General info for update",
    * required=true,
        * @OA\MediaType(mediaType="application/json",
            * @OA\Schema(
                * @OA\Property(property="about", type="string", example="", description="Type in new about section"),
                * @OA\Property(property="email", type="integer", example="", description="Type in new email"),
                * @OA\Property(property="address", type="string", example="", description="Type in new address"),
                * @OA\Property(property="phone_number", type="string", example="", description="Type in new phone number") ) ) ),
 * @OA\Parameter(@OA\Schema(type="string"),in="path",allowReserved=true,name="id",default="phone_number"),
 * @OA\Response(response="200", description="Update service")
 * )
 *  
 */
Flight::route('PUT /general/@entity', function(){
    $data=Flight::request()->data->getData();
    Flight::generalService()->update_generals($data);
});