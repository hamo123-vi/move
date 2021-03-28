<?php

class DiagnosisCheckDao extends BaseDao
{
    public function get_diagnosis_by_examination_id($examination_id)
    {
        return $this->query("SELECT a.type FROM diagnosis a
                            JOIN diagnosis_check b ON a.id=b.diagnosis_id
                            JOIN examinations c ON c.id=b.examination_id",
                            ["b.examination_id" => $examination_id]
                            );
    }

    public function get_diagnosis_by_user_id($user_id)
    {
        return $this->query("SELECT a.type FROM diagnosis a
                            JOIN diagnosis_check b ON a.id=b.diagnosis_id
                            JOIN examinations c ON b.examination_id=c.id
                            JOIN appointments d ON c.appointment_id=d.id
                            JOIN users e ON d.user_id=e.id",
                            ["e.id" => $user_id]
                            );
    }
}