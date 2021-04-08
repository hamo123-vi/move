<?php

    require_once dirname(__FILE__)."/../dao/DiagnosisCheckDao.Class.php";

    class DiagnosisCheckService
    {
        private $dao;

        public function __construct()
        {
            $this->dao=new DiagnosisCheckDao();
        }

        public function get_diagnosis_by_examination_id($examination_id)
        {
           return $this->dao->get_diagnosis_by_examination_id($examination_id);
        }

        public function get_diagnosis_by_user_id($user_id)
        {
            return $this->dao->get_diagnosis_by_user_id($user_id);
        }

    }