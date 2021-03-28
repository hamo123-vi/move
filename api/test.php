<?php

require_once dirname(__FILE__).'/dao/UserDao.Class.php';
require_once dirname(__FILE__).'/dao/AppointmentDao.Class.php';
require_once dirname(__FILE__).'/dao/DiagnosisDao.Class.php';
require_once dirname(__FILE__).'/dao/DiagnosisCheckDao.Class.php';
require_once dirname(__FILE__).'/dao/WorkoutDao.Class.php';
require_once dirname(__FILE__).'/dao/WorkoutCheckDao.Class.php';
require_once dirname(__FILE__).'/dao/ExaminationDao.Class.php';
require_once dirname(__FILE__).'/dao/GeneralDao.Class.php';
require_once dirname(__FILE__).'/dao/ServiceDao.Class.php';
require_once dirname(__FILE__).'/dao/ServiceCheckDao.Class.php';

$wo_dao=new WorkoutDao();

$workout3=
[
    "description" => "Uzmite dvije bučice i stanite u položaju širine ramena. Podignite ih preko glave sve dok obje ruke u potpunosti ne budu ispružene. Otpor bi trebao biti u dlanovima. Dlan vam treba biti okrenut prema gore. Iz ovog početnog položaja spustite bučice (držite nadlaktice blizu glave) polukružnim pokretom iza glave. Neka vam podlaktice dodiruju bicepse."
];
$wo_dao->update_workout_by_id($workout3, 1);















