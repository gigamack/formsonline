<?php
class UserModel extends CI_Model
{
    public $ID;
    public $Firstname;
    public $Lastname;
    public $Fullname;
    public $FullnameEng;
    public $UsernameWithFullname;
    public $Type;
    public $Faculty;
    public $Major;
    public $BirthDate;
    public $CardID;
    public $StudyLevel;

    public function __construct()
    {
        $this->load->model('PSUPassportModel');
        $this->load->model('StudentModel');

        $PSUPassportInfo = $_SESSION['PSUPassportInfo'];
        $StudentInfo = $_SESSION['StudentInfo'];
        $this->PSUPassportModel->setPSUPassport($PSUPassportInfo);
        $this->StudentModel->setStudent($StudentInfo);
        $this->setUser();
    }
    public function setUser()
    {
        $this->ID = $this->PSUPassportModel->UserID;
        $this->Type = $this->PSUPassportModel->UserType;
        $this->Firstname = $this->PSUPassportModel->Firstname;
        $this->Lastname = $this->PSUPassportModel->Lastname;
        $this->Fullname = $this->Firstname . " " . $this->Lastname;
        $this->FullnameEng = $this->setFullnameEng();
        $this->UsernameWithFullname = "(" . $this->PSUPassportModel->Username . ") " . $this->Fullname;
        $this->Faculty = $this->setFaculty();
        $this->Major = $this->StudentModel->MajorEng;
        $this->CardID = $this->PSUPassportModel->CardID;
        $this->StudyLevel = $this->StudentModel->StudyLevel;
        $this->BirthDate = $this->setBirthDate();
    }

    private function setFaculty()
    {
        $Faculty = "";
        switch ($this->Type) {
            case "Students":
                $Faculty = $this->StudentModel->FacultyEng;
                break;
            case "Staffs":
                $Faculty = $this->PSUPassportModel->FacultyName;
                break;
            default:
                break;
        }

        return $Faculty;
    }

    private function setBirthDate()
    {
        $BirthDate = "";

        switch ($this->Type) {
            case "Students":
                $BirthDate = $this->StudentModel->BirthDate;
                break;
            case "Staffs":
                break;
            default:
                break;
        }

        return $BirthDate;
    }

    public function setFullnameEng()
    {
        $FullnameEng = "";

        switch ($this->Type) {
            case "Students":
                $FullnameEng = $this->StudentModel->FirstnameEng . " " . $this->StudentModel->LastnameEng;
                break;
            case "Staffs":
                break;
            default:
                break;
        }

        return $FullnameEng;
    }
}
