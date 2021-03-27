<?php

require_once dirname(__FILE__).'/dao/UserDao.Class.php';

$user_dao=new UserDao();
/* $user=$user_dao->get_user_by_email("amil.valjevac@stu.ibu.edu.ba");
print_r($user); */

$user=
[
    "phone_number" => "38765999888",
    "first_name" => "Danijela",
    "last_name" => "Mitrović"

];


try
{
    $user_dao->update_user_by_email("danijela.mitrovic@hotmail.com", $user);
    echo "<br> UPDATED SUCCESSFULLY !!!";
}
catch(Exception $e)
{
    $e->getMessage();
}






