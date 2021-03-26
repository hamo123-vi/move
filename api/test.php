<?php

require_once dirname(__FILE__).'/dao/UserDao.Class.php';

$user_dao=new UserDao();
/* $user=$user_dao->get_user_by_email("amil.valjevac@stu.ibu.edu.ba");
print_r($user); */

$user=
[
    "email" => "bojana.bojic@gmail.com",
    "password" => "bojana123",
    "first_name" => "Bojana",
    "last_name" => "Bojić",
    "phone_number" => "38762101101"
];

$user_dao->add_user($user);


?>