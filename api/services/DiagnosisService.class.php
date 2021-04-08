<?php

    require_once dirname(__FILE__)."/../dao/DiagnosisDao.Class.php";

    class DiagnosisService
    {
        private $dao;

        public function __construct()
        {
            $this->dao=new DiagnosisDao();
        }

        public function get_all_appointments()
        {
            return $this->dao->get_all_appointments();
        }

        public function insert_diagnosis($diagnosis)
        {
            $this->dao->insert_diagnosis($diagnosis);
        }

        public function update_appointment($id, $appointment)
        {
            $this->dao->update_appointment($id, $appointment);
        }

    }
?>