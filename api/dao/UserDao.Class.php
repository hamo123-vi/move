<?php
require_once dirname(__FILE__).'/BaseDao.Class.php';

class UserDao extends BaseDao
{
    public function get_user_by_email($email)
    {
        return $this->query_unique("SELECT * FROM users WHERE email = :email", ["email" => $email]);
    }

    public function get_user_by_id($id)
    {
        return $this->query_unique("SELECT * FROM users WHERE id = :id", ["id" => $id]);
    }

    public function get_all_users()
    {
        return $this->query("SELECT * FROM users", []);
    }

    public function add_user($user)
    {
        $this->insert("users", $user);
    }

    public function update_user($id, $user)
    {
        $table="users";
        $this->update($table, $id, $user);
    }

    public function update_user_by_email($email, $user)
    {
        $this->update("users", $email, $user, "email");
    }
}