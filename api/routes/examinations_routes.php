<?php

Flight::route('GET /examinations', function(){
    Flight::json(Flight::examinationService()->get_examinations());
});