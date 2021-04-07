<?php

    require_once dirname(__FILE__)."/../dao/ServiceDao.Class.php";

    class ServiceService
    {
        private $dao;

        public function __construct()
        {
            $this->dao=new ServiceDao();
        }

        public function insert_service($service)
        {
            return $this->dao->insert_service($service);
        }

    }
?>