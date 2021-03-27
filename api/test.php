<?php

require_once dirname(__FILE__).'/dao/UserDao.Class.php';
require_once dirname(__FILE__).'/dao/AppointmentDao.Class.php';
require_once dirname(__FILE__).'/dao/DiagnosisDao.Class.php';

$user_dao=new UserDao();
$app_dao=new AppointmentDao();
$diagnosis_dao=new DiagnosisDao();

$diagnosis=
[
    "type" => "Diskus Hernija",
    "description" => "Diskus hernija, odnosno prolaps diska je dijagnoza
     koja se postavlja kada se pomjeri iz svog ležišta međupršljenski disk
     koji se nalazi između dva kičmena pršljena I dovede do pritiska na živac
     ili kičmenu moždinu. Pomjeranje diska se može desiti na bilo kojem dijelu
     kičme ali se najčešće javlja na vratnom dijelu 
     kičme ili lumbalnog dijela kičme."
];

try
{
    $diagnosis_dao->insert("diagnosis",$diagnosis);
    echo "INSERTED!!!";
}
catch(Exception $e)
{
    $e->getMessage();
}






