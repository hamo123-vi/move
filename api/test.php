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

$service_dao=new ServiceDao();
$service=
[
    "price" => 90
];
$service_dao->update_service_by_id($service, 2);














