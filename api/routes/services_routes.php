<?php
Flight::route('PUT /update_service/@id', function($id){
$data=Flight::request()->data->getData();
Flight::serviceDao()->update_service_by_id($data, $id);
Flight::json($data);
});
?>