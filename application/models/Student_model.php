<?php

class Student_model extends CI_Model
{
    private $StudentInfo;
    public function getStudentInfo($StudentID)
    {
        $this->load->library('StudentInfo');
        $this->StudentInfo = $this->studentinfo->getStudentInfo($StudentID);
        return $this->StudentInfo;
    }
}
