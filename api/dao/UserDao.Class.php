<?php
require_once dirname(__FILE__).'/BaseDao.Class.php';

class UserDao extends BaseDao
{
    public function get_user_by_email($email)
    {
        return $this->query_unique("SELECT * FROM users WHERE email = :email", ["email" => $email]);
    }

    public function add_user($user)
    {
        $sql="INSERT INTO users(email, password, first_name, last_name, phone_number) 
            VALUES (:email, :password, :first_name, :last_name, :phone_number)";
        $stmt=$this->connection->prepare($sql);
        $stmt->execute($user);
    }

    public function update_user($id, $user)
    {
        $table="users";
        $this->update($table, $id, $user);
    }
}