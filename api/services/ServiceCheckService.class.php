<?php

    require_once dirname(__FILE__)."/../dao/ServiceCheckDao.Class.php";

    class ServiceCheckService
    {
        private $dao;

        public function __construct()
        {
            $this->dao=new ServiceCheckDao();
        }

        public function get_services_by_appointment_id($appointment_id)
        {
            return $this->dao->get_services_by_appointment_id($appointment_id);
        }

    }
?>