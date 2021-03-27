<?php

require_once dirname(__FILE__)."/BaseDao.Class.php";

class DiagnosisDao extends BaseDao
{
    public function insert_diagnosis($diagnosis)
    {
        $this->insert("diagnosis", $diagnosis);
    }
}