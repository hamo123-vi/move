<?php

require_once dirname(__FILE__).'/dao/UserDao.Class.php';

$user_dao=new UserDao();
/* $user=$user_dao->get_user_by_email("amil.valjevac@stu.ibu.edu.ba");
print_r($user); */

$user=
[
    "password" => "dafxfeuro6"
];

try
{
    $user_dao->update_user_by_email("amil.valjevac@stu.ibu.edu.ba", $user);
    echo " UPDATED!";
}
catch(Exception $e)
{
    $e->getMessage();
}
