<?php

require_once dirname(__FILE__).'/dao/UserDao.Class.php';
require_once dirname(__FILE__).'/dao/AppointmentDao.Class.php';
require_once dirname(__FILE__).'/dao/DiagnosisDao.Class.php';

$user_dao=new UserDao();
$app_dao=new AppointmentDao();
$diagnosis_dao=new DiagnosisDao();

$diagnosis=
[
    "description" => "Reumatoidni artritis je teška, kronična,
                         upalna bolest vezivnog tkiva koje se najviše očituje
                          na zglobovima. U ovom poremećaju imunološki sustav napada
                           hrskavično tkivo, kosti i, ponekad, unutarnje organe.
                            Od zglobova su najčešće zahvaćeni mali zglobovi šake, zglavci,
                             ramena, koljena i gležnjevi. Uz odgovarajuće zdravstvene mjere
                              i izmjene životnog stila, oboljeli mogu imati dug i kvalitetan život."
];

try
{
    $diagnosis_dao->update_diagnosis("Reumatoidni artritis",$diagnosis);
    echo "UPDATED!!!";
}
catch(Exception $e)
{
    $e->getMessage();
}






