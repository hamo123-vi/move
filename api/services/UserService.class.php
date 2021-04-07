<?php 
    require_once dirname(__FILE__)."/../dao/UserDao.Class.php";
    class UserService 
    {
        private $dao;
        public function __construct()
        {
            $this->dao=new UserDao();
        }

        public function get_all_users($offset, $limit)
        {
            return $this->dao->get_all_users($offset, $limit);
        }

        public function get_user_by_id($id)
        {
            return $this->dao->get_user_by_id($id);
        }

        public function add_user($user)
        {
            $this->dao->add_user($user);
        }
    }
?>