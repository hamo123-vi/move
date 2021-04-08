<?php

Flight::route('POST /service', function(){
    $data=Flight::request()->data->getData();
    Flight::serviceService()->insert_service($data);
    Flight::json($data);
});

Flight::route('PUT /update_service/@id', function($id){
    $data=Flight::request()->data->getData();
    Flight::serviceService()->update_service_by_id($data, $id);
    Flight::json($data);
});

/**
 * @OA\Get(
 *     path="/all_services",
 *     @OA\Response(response="200", description="Get services from database")
 * )
 */
Flight::route('GET /all_services', function(){
    Flight::json(Flight::serviceService()->get_all_services());
})

?>