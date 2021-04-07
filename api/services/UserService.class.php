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
    }
?>