<?php

class DiagnosisCheckDao extends BaseDao
{
    public function get_diagnosis_by_examination_id($examination_id)
    {
        return $this->query("SELECT a.type FROM diagnosis a
                     JOIN diagnosis_check b ON a.id=b.diagnosis_id
                     JOIN examinations c ON c.id=b.examination_id",["b.examination_id" => $examination_id]);
    }
}