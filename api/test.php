<?php

require_once dirname(__FILE__).'/dao/UserDao.Class.php';

$user_dao=new UserDao();
/* $user=$user_dao->get_user_by_email("amil.valjevac@stu.ibu.edu.ba");
print_r($user); */

$user=
[
    "email" => "bojic.bojana@gmail.com",
    "password" => "password263"
];

$sql="UPDATE users SET ";
        foreach($user as $key => $value)
        {
            $sql.= $key ." = :" .$key . ", ";
        }
        $sql=substr($sql, 0, -2);
        $sql.=" WHERE id = :id";
echo $sql;
$id=2;
$user_dao->update_user($id, $user);

