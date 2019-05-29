<?php

class Student_model extends CI_Model
{
    private $StudentInfo;
    private $StudentGPA;
    public function getStudentInfo($StudentID)
    {
        $this->load->library('StudentInfo');
        $this->StudentInfo = $this->studentinfo->getStudentInfo($StudentID);
        return $this->StudentInfo;
    }
    public function getStudentGPA($StudentID)
    {
        $this->load->library('StudentInfo');
        $this->getStudentGPA = $this->studentinfo->getStudentGPA($StudentID);
        return $this->getStudentGPA;
    }
}
