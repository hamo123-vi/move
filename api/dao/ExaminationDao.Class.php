<?php

require_once dirname(__FILE__)."/BaseDao.Class.php";

class ExaminationDao extends BaseDao
{
    public function insert_examination($examination)
    {
        $this->insert("examinations", $examination);
    }
}